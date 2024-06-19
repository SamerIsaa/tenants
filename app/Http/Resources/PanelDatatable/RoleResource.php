<?php

namespace App\Http\Resources\PanelDatatable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.roles.partials.options', ['instance' => $this])->render();


        return [
            'check' => '',
            'id' => $this['id'],
            'name' => @$this['name'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'options' => $options,
        ];
    }
}
