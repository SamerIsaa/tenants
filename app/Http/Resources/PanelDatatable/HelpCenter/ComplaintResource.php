<?php

namespace App\Http\Resources\PanelDataTable\HelpCenter;

use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $options = view('panel.help_center.complaints.partials.options', ['instance' => $this])->render();
        return [
            'check' => '',
            'id' => $this['id'],
            'subject' => $this['subject'],
//            'sender' => $this->sender->getFullName(),
            'sender_type' => $this->sender instanceof User ? 'User' : 'Vendor',
//            'description' => $this['description'],
            'status' => $this['status'],
            'status_str' => __('constants.' . $this['status']),

            'sent_time' => Carbon::parse($this->sent_time)->format('Y-m-d H:i A'),
            'read_at' => $this->read_at ? Carbon::parse($this->read_at)->format('Y-m-d H:i A') : '-',
            'options' => $options,

        ];

    }
}
