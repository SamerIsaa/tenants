<?php

namespace App\Http\Resources\PanelDataTable;

use Illuminate\Http\Resources\Json\JsonResource;

class BankTransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.financial.bank_transfers.partials.options', ['instance' => $this])->render();
//        $active = view('panel.financial.bank_transfers.partials.active_status', ['instance' => $this])->render();

	    return [
		    'check' => '',
		    'id' => $this->id,
		    'user' => $this->user->name,
		    'bank_account' => $this->bankAccount->bank_name . ' | ' . $this->bankAccount->iban,
		    'sender_name' => $this->name,
		    'sender_bank' => $this->bank,
		    'sender_iban' => $this->iban,
            'sender_account_no' => $this->account_no,
            'amount' => $this->amount,

//            'active' => $active,
		    'options' => $options,
	    ];
    }
}
