<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\LoginEvent;
use App\Listeners\LastLoginUpateListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        LoginEvent::class => [
            LastLoginUpateListener::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
                // ... other providers
                \SocialiteProviders\VKontakte\VKontakteExtendSocialite::class.'@handle',
                \SocialiteProviders\GitHub\GitHubExtendSocialite::class.'@handle',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
