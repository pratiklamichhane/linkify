<?php 



namespace App\Jobs;

use App\Mail\ReminderEmail;
use App\Models\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $link;

    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function handle()
    {
        // Send the reminder email
        \Mail::to($this->link->user->email)->send(new ReminderEmail($this->link));
    }
}



