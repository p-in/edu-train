<?php

namespace App\Http\Controllers;

use App\Events\UpdateUserEvent;
use Illuminate\Http\Request;
use App\Jobs\TestQueue;
use App\UserMaster;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;

class TestController extends Controller
{
    
    public function testJob()
    {
        $count = 0;
        
        $ret = \DB::table('user_master')->select('id', 'username')
            ->chunkById('300', function ($data) use (&$count) {
    
                $data = collect($data)->toArray();
                $jobs = (new TestQueue($data,$count))
                    ->onQueue('user-master-'.$count)
                ->delay((Carbon::now())->addSecond(20 * $count));
                dispatch($jobs);
                $count++;
            });
        
        return 123;
    }
    
    public function testEvent(){
        $ret = UserMaster::where('id',1)->update(['username'=>'测试用户']);
        if ($ret !== false) event(new UpdateUserEvent(1));
    }
}
