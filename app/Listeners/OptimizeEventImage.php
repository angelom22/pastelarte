<?php

namespace App\Listeners;

use App\Events\EventSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeEventImage
{
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
     * Handle the event.
     *
     * @param  EventSaved  $event
     * @return void
     */
    public function handle(EventSaved $event)
    {
        // optimización de la imagen
        $image = Image::make(Storage::get($event->event->file))
                        ->widen(600)
                        ->encode();

        // se reemplaza la imagen que subio el usuario por la imagen optimizada
        Storage::put($event->event->file, (string) $image);
    }
}
