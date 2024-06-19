<?php

namespace App\Http\Resources\PanelDatatable;

use Illuminate\Http\Resources\Json\JsonResource;
use View;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.blogs.partials.options', ['instance' => $this])->render();
        $activation = view('panel.blogs.partials.active_status', ['instance' => $this])->render();
	    return [
		    'check' => '',
		    'id' => $this->id,
		    'title' => $this->title,
            'is_active' => $activation,
		    'options' => $options,
	    ];
    }
}
