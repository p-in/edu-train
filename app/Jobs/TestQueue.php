<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $data = [];
    private $count = 0;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $count)
    {
        $this->data = $data;
        $this->count = ++$count;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        file_put_contents('./public/test-job-' . $this->count . '.txt', json_encode($this->data));
    }

}
