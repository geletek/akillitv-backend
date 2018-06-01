<?php

namespace App\Listeners\Backend\Video\Category;

/**
 * Class CategoryEventListener.
 */
class CategoryEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Category Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
      //var_dump($event);exit;
        \Log::info('Category Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Category Deleted');
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        \Log::info('Category Deactivated');
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        \Log::info('Category Reactivated');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info('Category Permanently Deleted');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info('Category Restored');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Video\Category\CategoryCreated::class,
            'App\Listeners\Backend\Video\Category\CategoryEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Video\Category\CategoryUpdated::class,
            'App\Listeners\Backend\Video\Category\CategoryEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Video\Category\CategoryDeleted::class,
            'App\Listeners\Backend\Video\Category\CategoryEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Video\Category\CategoryDeactivated::class,
            'App\Listeners\Backend\Video\Category\CategoryEventListener@onDeactivated'
        );

        $events->listen(
            \App\Events\Backend\Video\Category\CategoryReactivated::class,
            'App\Listeners\Backend\Video\Category\CategoryEventListener@onReactivated'
        );

        $events->listen(
            \App\Events\Backend\Video\Category\CategoryPermanentlyDeleted::class,
            'App\Listeners\Backend\Video\Category\CategoryEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Video\Category\CategoryRestored::class,
            'App\Listeners\Backend\Video\Category\CategoryEventListener@onRestored'
        );
    }
}
