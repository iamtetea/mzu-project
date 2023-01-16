<?php

namespace App\Services;

use App\Models\EventItem;

class EventItemService
{
    public function create($eventId, $item) : EventItem
    {
        $file_path = 'events';
        $storage = new StorageService();
        $image_path = $storage->uploadImage($file_path, $item['image']);

        $attributes['event_id'] = $eventId;
        $attributes['price'] = $item['price'];
        $attributes['image_path'] = $image_path;

        $item = EventItem::create($attributes);
        return $item;
    }
}
