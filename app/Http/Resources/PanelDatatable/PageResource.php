<?php

namespace App\Http\Resources\PanelDataTable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $options = view('panel.pages.partials.options', ['instance' => $this])->render();
//        $image = view('panel.pages.partials.images', ['instance' => $this])->render();
        return [
            'check' => '',
            'id' => $this['id'],
            'title' => $this['title'],
            'content' => $this['content'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'options' => $options,

        ];
    }
}
