<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $events = [];
        foreach($this->collection as $event) {
            array_push($events, [
                'name' => $event->name,
                'date' => $event->date,
                'limit' => $event->limit,
            ]);
        }
        return $events;
    }
}
