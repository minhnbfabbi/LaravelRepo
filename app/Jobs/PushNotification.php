<?php

namespace App\Jobs;

use App\Services\Notification\INotificationService;
use App\Services\Notification\FcmService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Notify;

class PushNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $serviceMethod;

    protected $methodParams;

    protected $notify;
    /**
     * Notification constructor.
     * @param $serviceMethod
     * @param $methodParams
     * @param string $methodHttp
     */
    public function __construct($serviceMethod, $methodParams = [[]])
    {
        $this->serviceMethod = $serviceMethod;
        $this->methodParams = $methodParams;
    }

    /**
     * @param INotificationService $notificationService
     */
    public function handle(INotificationService $notificationService)
    {
        call_user_func_array(
            [
                $notificationService,
                $this->serviceMethod,
            ],
            $this->methodParams
        );
    }
}