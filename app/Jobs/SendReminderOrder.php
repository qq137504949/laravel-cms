<?php

namespace App\Jobs;

use App\Models\Admin;
use App\Services\Core;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Redis;

class SendReminderOrder implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,Core;

    protected  $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->user = $admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for($i=0;$i<10;$i++){
            Redis::publish('chatchannel','测试队列执行的-'.$i);
        }
//        Redis::del('queues:default');
        //Redis::set('user_id','admin');
        //$this->AdminLog('测试队列执行的');
    }

    public function failed()
    {
        dump('failed');
    }
}
