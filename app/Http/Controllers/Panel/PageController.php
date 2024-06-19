<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\PageRequest;
use App\Http\Resources\PanelDataTable\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index()
    {
        return view('panel.pages.index');
    }

    public function datatable(Request $request)
    {
        $items = Page::query()->filter();
        $resource = new PageResource($items);
        return filterDataTable($items,$resource, $request);
    }


    public function create()
    {
        return view('panel.pages.create');
    }

    public function store(PageRequest $request)
    {
        Page::create($request->only(Page::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Page::findOrFail($id);
        return view('panel.pages.create', $data);
    }

    public function update(PageRequest $request, $id)
    {
        $item = Page::updateOrCreate(['id' => $id ] , $request->only(Page::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);

    }


    public function destroy($id)
    {
        $admin = Page::find($id);
        return $admin->delete() ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

}
