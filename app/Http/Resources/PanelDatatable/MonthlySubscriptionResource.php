<?php

namespace App\Http\Resources\PanelDataTable;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MonthlySubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.financial.monthly_subscriptions.partials.options', ['instance' => $this])->render();

	    return [
		    'check' => '',
		    'id' => $this->id,
		    'user' => $this->user->name,
		    'monthly_installment' => $this->monthly_installment,
            'started_at' => Carbon::parse($this->started_at)->format('Y-m-d'),
            'ended_at' => isset($this->ended_at) ? Carbon::parse($this->ended_at)->format('Y-m-d') : '-',
            'is_active' => (boolean)$this->is_active,
            'status' => $this->getStatus(),
		    'options' => $options,
	    ];
    }
}
