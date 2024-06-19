<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Requests\Panel\FaqRequest;
use App\Http\Resources\PanelDataTable\FaqResource;
use App\Models\Faq;
use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('panel.faqs.index');
    }


    public function datatable(Request $request)
    {
        $items = Faq::query()->search($request)->orderByDesc('created_at');
        $resource = new FaqResource($items);
        return filterDataTable($items, $resource, $request);
    }

    public function create()
    {
        $data['faq_categories'] = FaqCategory::all();
        return view('panel.faqs.create' , $data);
    }

    public function store(FaqRequest $request)
    {
        $data = $request->only(Faq::FILLABLE);
        Faq::create($data)->createTranslation($request);

        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function edit(Request $request, $id)
    {
        $data['item'] = Faq::findOrFail($id);
        $data['faq_categories'] = FaqCategory::all();
        return view('panel.faqs.create', $data);
    }

    public function update($id, FaqRequest $request)
    {
        $item = Faq::findOrFail($id);
        $data = $request->only(Faq::FILLABLE);

        $item->update($data);
        $item->createTranslation($request);
        return $this->response_api(true, trans('messages.added_successfully'), StatusCodes::OK);
    }


    public function operation(Request $request)
    {
        $item = Faq::find($request->id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
        } else {
            return $this->response_api(false, 'حدث خطأ أثناء المعالجة', StatusCodes::INTERNAL_ERROR);
        }

    }


    public function destroy($id)
    {
        $item = Faq::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(false, 'حدث خطأ أثناء المعالجة', StatusCodes::INTERNAL_ERROR);
    }


}
