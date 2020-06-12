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
use App\Jobs\PushNotification;
use Carbon\Carbon;
use App\Services\Notification\FcmService;
use App\Traits\HandleCollectionNotify;

class NotifyController extends Controller
{
    use HandleCollectionNotify;
    
    private $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Notify $model)
    {
        $this->model = $model;
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

            $this->dispatch(new PushNotification('sendNotification', $this->getCollectionNotify($notify)));
            $this->dispatch(new SendNotifyEmail($notify));

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

    public function list(Request $request)
    {
        $page = isset($request->page) ? $request->page : 1;
        return $this->model->paginationApi($page);        
    }

    public function userList(Request $request)
    {
        $usersRead = $this->model
            ->find($request->notify_id)
            ->users()
            ->get()
            ->map(function($item, $key) {
                $item['is_read'] = $item['pivot']['is_read'];
                unset($item['pivot']);
                return $item;
            })
            ->toArray();

        return response()->json(['users_read' => $usersRead], 200);  
    }
}