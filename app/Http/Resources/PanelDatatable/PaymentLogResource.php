<?php

namespace App\Http\Resources\PanelDataTable;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.financial.cash_payments.partials.options', ['instance' => $this])->render();

        return [
            'check' => '',
            'id' => $this->id,
            'user' => $this->user->name,
            'category' => isset($this->category_id) ? @$this->category->name : __('panel.monthly_subscriptions'),
            'status' => $this->getStatus(),
            'amount' => $this->amount,
            'payment_method' => $this->getPaymentMethod(),
            'type' => $this->getType(),
            'options' => $options,
        ];
    }
}
