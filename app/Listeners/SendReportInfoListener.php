<?php

namespace App\Listeners;

use App\Events\CreatedReportEvent;
use App\Mail\CreatedReportNotificationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendReportInfoListener
{

    public function handle(CreatedReportEvent $event): void
    {
        $report = $event->report;

        $name = $report->user->name;
        $title = $report->title;
        $published_at = $report->published_at;
        $email = $report->user->email;

        Mail::to($email)->send(new CreatedReportNotificationMail($name, $title, $published_at));
    }

}
