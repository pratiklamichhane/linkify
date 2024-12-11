<?php


namespace App\Mail;

use App\Models\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $link;

    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function build()
    {
        return $this->subject('Reminder: ' . $this->link->title)
                    ->view('emails.reminder') // Create the reminder email view
                    ->with([
                        'link' => $this->link
                    ]);
    }
}



