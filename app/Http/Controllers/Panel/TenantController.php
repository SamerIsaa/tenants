<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\TenantRequest;
use App\Http\Resources\PanelDatatable\TenantResource;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        return view('panel.tenants.index');
    }

    public function create()
    {
        return view('panel.tenants.create');
    }

    public function store(TenantRequest $request)
    {
        $data = $request->all();
        $item = Tenant::query()->create(['name' => $data['name']]);
        $item->domains()->create(['domain' => $data['domain']]);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Tenant::findOrFail($id);
        $data['domain'] = $data['item']->domains()->first();
         return view('panel.tenants.create', $data);
    }

    public function update(TenantRequest $request, $id)
    {
        $data = $request->all();
        $item = Tenant::query()->findOrFail($id);

        $item->update($data);
        $item->domains()->updateOrCreate(['id' => $request->domain_id ] ,['domain' => $data['domain']]);

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $user = Tenant::query()->find($id);
        return $user->delete() ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(true, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable(Request $request  )
    {
        $items = Tenant::query()->filter();
        $resource= new TenantResource($items);
        return filterDataTable($items ,$resource,$request);
    }



}
