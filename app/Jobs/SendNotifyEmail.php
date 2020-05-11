<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Notify;
use App\Models\User;
use Mail;

class SendNotifyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $notify;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Notify $notify)
    {
        $this->notify = $notify;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('is_admin', false)->get();
        $link = env('APP_URL') . '/notifies/' . $this->notify->id;
        $data = [
            'title'=> 'Nội dung thông báo',
            'body'=> [
                'link' => 'Mấy bro click vô link để đọc thông báo nhé: <a href=' . $link . '>' . $link . '</a>'
            ],
        ];

        if(!empty($users)) {
            foreach ($users as $user) {
                Mail::send('emails.notify', $data, function($message) use ($user) {
                    $message->from('admin@base.com', 'Super Admin');
                    $message->to($user->email)->subject('Thông báo từ Admin');
                });
            }
        }
    }
}