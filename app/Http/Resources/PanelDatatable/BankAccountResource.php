<?php

namespace App\Http\Resources\PanelDataTable;

use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.financial.bank_accounts.partials.options', ['instance' => $this])->render();
        $active = view('panel.financial.bank_accounts.partials.active_status', ['instance' => $this])->render();

	    return [
		    'check' => '',
		    'id' => $this->id,
		    'bank_name' => $this->bank_name,
		    'owner_name' => $this->owner_name,
		    'number' => $this->number,
		    'iban' => $this->iban,
		    'swift' => $this->soft,
		    'active' => $active,
		    'options' => $options,
	    ];
    }
}
