<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Notify\CreateRequest;
use App\Models\Notify;
use App\Models\UserNotify;
use App\Models\User;
use App\Jobs\SendNotifyEmail;
use Carbon\Carbon;

class NotifyController extends Controller
{

    private $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Notify;
    }

    public function create(Request $request)
    {
        return [];
    }
    
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();

        try {

            $notify = $this->model->create([
                'title' => $data['title'],
                'content' => $data['content'],
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);

            $this->dispatch(new SendNotifyEmail($notify));

            $users = User::where('is_admin', false)
                ->get()
                ->map(function($item, $key) use ($notify) {
                    return [
                        'notify_id' => $notify->id, 
                        'user_id' => $item->id, 
                        'is_read' => false,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];
                })
                ->toArray();

            $notify->find($notify->id)->users()->attach($users);

        } catch (Exception $e) {
            abort(500);
        }

        return response()->json(['data' => 'success'], 201);
    }

    public function show(Request $request)
    {
        $user = auth()->user();

        $notifyId = $request->id;

        try {

            $this->model
                ->find($notifyId)
                ->users()
                ->updateExistingPivot(
                    $user->id, 
                    ['is_read' => true]
                );

        } catch(Exception $e) {
            abort(500);
        } 

        return $this->model->find($notifyId);
    }
}