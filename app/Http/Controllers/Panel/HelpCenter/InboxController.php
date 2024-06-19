<?php

namespace App\Http\Controllers\Panel\HelpCenter;

use App\Constants\StatusCodes;
use App\Http\Resources\PanelDataTable\HelpCenter\InboxResource;
use App\Models\Contact;
use App\Models\Replay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InboxController extends Controller
{


    public function index()
    {
        return view('panel.help_center.inbox.index');
    }


    public function datatable(Request $request)
    {
        $items = Contact::query()->filter();
        $resource = new InboxResource($items);
        return filterDataTable($items ,$resource,$request);
    }


    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->read_at = now();
        $contact->save();
        $data['item'] = $contact;
        return view('panel.help_center.inbox.show' , $data);
    }

    public function destroy($id)
    {
        $admin = Contact::find($id);
        return $admin->delete() ? $this->response_api(true, __('messages.deleted_successfully'), StatusCodes::OK) : $this->response_api(true, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function replay(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'contact_id' => 'required|exists:contacts,id',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => StatusCodes::VALIDATION_ERROR,
                'msg'   => $validator->errors()->first()
            ],StatusCodes::VALIDATION_ERROR);
        }
        $contact=Contact::findOrFail($request->contact_id);
//        Mail::send( [],  [], function($message) use ($request,$contact)
//        {
//            $message->setBody($request->message, 'text/html'); // for HTML rich messages.
//            $message->subject('Hama website');
//            $message->from('no-replay@quran.apex.ps', 'Quran');
//            $message->to($contact->email);
//        });
        Replay::create($data);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }



}
