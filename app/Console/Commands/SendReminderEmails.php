<?php
namespace App\Console\Commands;

use App\Jobs\SendReminderEmail;
use App\Models\Link;
use Illuminate\Console\Command;
//schedule the command to run every minute
use Illuminate\Console\Scheduling\Schedule;


class SendReminderEmails extends Command
{
    protected $signature = 'reminders:send';

    protected $description = 'Send reminder emails for links with passed reminder duration';

    public function handle()
    {
        // Fetch links with reminders that are due and not yet sent
        $links = Link::where('reminder_at', '<=', now())
            ->get();

        foreach ($links as $link) {
            // Dispatch the email job
            SendReminderEmail::dispatch($link);

            // Update the record to mark the reminder as sent
            $link->update(['reminder_at' => now()]);
        }

        $this->info("Reminder emails sent for all due links.");
    }

    public function schedule(Schedule $schedule)
{
    // Run the command every minute
    $schedule->command(static::class)->everyMinute();
}


    
}
