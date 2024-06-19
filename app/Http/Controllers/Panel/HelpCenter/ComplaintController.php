<?php

namespace App\Http\Controllers\Panel\HelpCenter;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Resources\PanelDataTable\HelpCenter\ComplaintResource;
use App\Models\Complaint;
use App\Models\ComplaintReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('panel.help_center.complaints.index');

    }

    public function datatable(Request $request)
    {
        $items = Complaint::query()->filter();
        $resource = new ComplaintResource($items);
        return filterDataTable($items, $resource, $request);
    }


    public function show($id)
    {
        $data['complaint'] = Complaint::findOrFail($id);
        return view('panel.help_center.complaints.show', $data);
    }

    public function replay(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'complaint_id' => 'required|exists:complaints,id',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => StatusCodes::VALIDATION_ERROR,
                'msg' => $validator->errors()->first()
            ], StatusCodes::VALIDATION_ERROR);
        }
        $complaint = Complaint::findOrFail($request->complaint_id);

        $user = auth('admin')->user();

        ComplaintReply::create([
            'sender_type' => get_class($user),
            'sender_id' => $user->id,
            'complaint_id' => $complaint->id,
            'message' => $data['message'],
        ]);

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function operation($id, $status)
    {
        if (!in_array($status, ['pending', 'solved', 'canceled'])) {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

        $complaint = Complaint::findOrFail($id);
        $complaint->status = $status;
        $complaint->save();

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $admin = Complaint::find($id);
        return $admin->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }
}
