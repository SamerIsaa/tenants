<?php

namespace App\Http\Resources\PanelDatatable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.admins.partials.options', ['instance' => $this])->render();

        return [
            'name' => $this['name'],
            'email' => $this['email'],
            'created_at' => Carbon::parse($this['created_at'])->format('Y-m-d'),
            'options' => $options,
        ];
    }
}
