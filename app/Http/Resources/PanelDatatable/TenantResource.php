<?php

namespace App\Http\Resources\PanelDatatable;

use App\Model\PaymentLog;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.tenants.partials.options', ['instance' => $this])->render();
//        $image = view('panel.users.partials.images', ['instance' => $this])->render();
//        $active = view('panel.users.partials.active_status', ['instance' => $this])->render();

        return [
//            'avatar' => $image,
//            'ssn_id' => $this['ssn_id'],
            'id' => $this['id'],
            'name' => $this['name'],
//            'email' => $this['email'],
//            'mobile' => @$this['mobile']??'-',
            'created_at' => Carbon::parse($this['created_at'])->format('Y-m-d'),
//            'total_payments' => $this->paymentLog()->filter()->status(PaymentLog::ACCEPTED)->sum('amount'),
//            'total_subscription_arrears' => $this->paymentLog()->filter()->where('is_subscription' , 1)->whereNotNull('subscription_id')
//                ->where('status' , '<>' ,PaymentLog::ACCEPTED)->sum('amount') ,
//            'active' => $active,
            'options' => $options,
        ];
    }
}
