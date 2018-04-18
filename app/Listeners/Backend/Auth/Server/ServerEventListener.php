<?php

namespace App\Listeners\Backend\Auth\Server;

/**
 * Class ServerEventListener.
 */
class ServerEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Server Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Server Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Server Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Auth\Server\ServerCreated::class,
            'App\Listeners\Backend\Auth\Server\ServerEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Auth\Server\ServerUpdated::class,
            'App\Listeners\Backend\Auth\Server\ServerEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Auth\Server\ServerDeleted::class,
            'App\Listeners\Backend\Auth\Server\ServerEventListener@onDeleted'
        );
    }
}
