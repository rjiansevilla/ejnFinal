<?php

namespace App\Listeners;

use App\Events\EventActivities;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use JWTAuth;

class Activities
{
    use InteractsWithQueue;

    private $activities;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle Saving Activities
     * @return void
     */
    public function handleSavingActivity(EventActivities $activities)
    {
        $activities->getModel()->create($activities->getJsonData());
    }
}
