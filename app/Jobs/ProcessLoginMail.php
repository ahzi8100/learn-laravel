<?php

namespace App\Jobs;

use App\Mail\LoginMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessLoginMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $user, public $ip, public $time, public $userAgent)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user)->send(new LoginMail($this->user, $this->ip, $this->time, $this->userAgent));
        sleep(1);
    }
}
