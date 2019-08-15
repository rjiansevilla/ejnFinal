<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Activities;

class EventActivities
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $jsonData;
    protected $model;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($jsonData = array())
    {
        $this->jsonData = $jsonData;
        $this->model = new Activities();
    }

    /**
     * It will get the JSON Data Protected
     * @return Array
     */
    public function getJsonData()
    {
        return $this->jsonData;
    }

    /**
     * Get the MODEL
     * @return Object
     */
    public function getModel()
    {
        return $this->model;
    }
}

