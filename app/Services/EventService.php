<?php

namespace App\Services;

use App\Jobs\EventCode;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventService
{
    public function create($attributes) : Event
    {
        $attributes['user_id'] = Auth::user()->id;
        $attributes['category_id'] = $attributes['category'];
        $attributes['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $attributes['name']));

        $event = Event::create($attributes);
        EventCode::dispatch($event->id);

        $attributes['event_id'] = $event['id'];

        foreach ($attributes['items'] as $item) {
            $itemService = new EventItemService();
            $itemService->create($attributes['event_id'], $item);
        }

        return $event;
    }

    public function update($id, $attributes) : Event
    {
        info($attributes);
        $attributes['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $attributes['name']));

        $data = Event::findOrFail($id);
        $data->name = $attributes['name'];
        $data->slug = $attributes['slug'];
        $data->date = $attributes['date'];
        $data->details = $attributes['details'];
        $data->category_id = $attributes['category'];
        $data->limit = $attributes['limit'];
        $data->save();

        return $data;
    }
}
