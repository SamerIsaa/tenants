<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\RoleRequest;
use App\Http\Resources\PanelDataTable\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $data['title'] = __('panel.roles_permissions');
        return view('panel.roles.index', $data);
    }


    public function datatable(Request $request)
    {
        $items = Role::query()->filter();
        $resource = new RoleResource($items);
        return filterDataTable($items, $resource, $request);
    }

    public function create()
    {
        $data['title'] = __('panel.roles_permissions');
        return view('panel.roles.create' , $data);
    }

    public function store(RoleRequest $request)
    {

        $data = $request->only('name');
        $data['guard_name'] = 'admin';
        $role = Role::create($data);
        $role->syncPermissions([]);

        if (isset($request->permissions) && count($request->permissions) > 0) {
            foreach ($request->permissions as $item) {
                $permission = Permission::firstOrCreate(['name' => $item]);
                if (!isset($permission)) {
                    return $this->response_api(false, __('messages.error'));
                }
                $role->givePermissionTo($permission);
            }
        }

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['title'] = __('panel.roles_permissions');
        $data['item'] = Role::findOrFail($id);
        return view('panel.roles.create', $data);
    }

    public function update($id, RoleRequest $request)
    {
        $data = $request->only('name');
        $role = Role::findOrFail($id);

        $role->update($data);
        $role->syncPermissions([]);

        if (isset($request->permissions) && count($request->permissions) > 0) {
            foreach ($request->permissions as $item) {
                $permission = Permission::firstOrCreate(['name' => $item]);
                if (!isset($permission)) {
                    return $this->response_api(false, __('messages.error'));
                }
                $role->givePermissionTo($permission);
            }
        }

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }


    public function destroy($id)
    {
        $role = Role::findById($id);
        return $role->delete() ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function deleteAll(Request $request)
    {
        Role::query()->whereIn('id', $request->items)->where('id', '<>', 1)->delete();
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

}
