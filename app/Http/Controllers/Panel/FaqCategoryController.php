<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\Panel\FaqCategoryRequest;
use App\Http\Resources\PanelDataTable\FaqCategoryResource;
use App\Models\FaqCategory;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $data['title'] = __('panel.categories');
        return view('panel.faq_categories.index', $data);
    }

    public function datatable(Request $request)
    {
        $items = FaqCategory::query()->filter($request);
        $resource = new FaqCategoryResource($items);
        return filterDataTable($items, $resource, $request);
    }

    public function create()
    {
        $data['title'] = __('constants.add');
        return view('panel.faq_categories.create', $data);
    }

    public function store(FaqCategoryRequest $request)
    {
        $data = $request->only(FaqCategory::FILLABLE);
        FaqCategory::create($data)->createTranslation($request);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = FaqCategory::findOrFail($id);
        $data['title'] = __('constants.edit');
        return view('panel.faq_categories.create', $data);
    }

    public function update(FaqCategoryRequest $request, $id)
    {
        $data = $request->only(FaqCategory::FILLABLE);
        FaqCategory::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = FaqCategory::find($id);
        return isset($item) && $item->delete() ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(true, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }

}
