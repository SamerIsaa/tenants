<?php

namespace App\Http\Resources\PanelDataTable\HelpCenter;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class InboxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $options = view('panel.help_center.inbox.partials.options', ['instance' => $this])->render();

        return [
            'check' => '',
            'id' => $this['id'],
            'name' => $this['name'],
            'email' => $this['email'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'options' => $options,
        ];
    }
}
