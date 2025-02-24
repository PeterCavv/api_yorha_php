<?php

namespace App\Providers;

use App\Events\CreatedReportEvent;
use App\Listeners\SendReportInfoListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        CreatedReportEvent::class => [
            SendReportInfoListener::class
        ]
    ];

    public function register(): void
    {

    }

    public function boot(): void
    {
    }
}
