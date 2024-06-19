<?php

namespace App\Http\Resources\PanelDataTable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.faqs.partials.options', ['instance' => $this])->render();
        $active = view('panel.faqs.partials.active_status', ['instance' => $this])->render();

        return [
            'check' => '',
            'id' => $this['id'],
            'category' => @$this->faqCategory->name,
            'title' => $this['title'],
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'active' => $active,
            'options' => $options,
        ];
    }
}
