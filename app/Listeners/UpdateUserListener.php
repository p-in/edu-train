<?php

namespace App\Listeners;

use App\Events\UpdateUserEvent;
use App\UserMaster;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *  在更新用户信息的时候 更新用户表的更新时间
     *
     * @param  UpdateUserEvent  $event
     * @return void
     */
    public function handle(UpdateUserEvent $event)
    {
        UserMaster::where('id' , $event->userId)->update(['update_time'=>time()]);
    
    }
}
