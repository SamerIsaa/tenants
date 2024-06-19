<?php

namespace App\Http\Controllers\Panel;

use App\Http\Resources\PanelDatatable\AdminResource;
use App\Models\Admin;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AdminRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('panel.admins.index');
    }

    public function datatable(Request $request)
    {
        $items = Admin::query()->filter();
        $resource = new AdminResource($items);
        return filterDataTable($items, $resource, $request);
    }


    public function create()
    {
        $data['roles'] = Role::all();
        return view('panel.admins.create' , $data);
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $admin = Admin::create($data);
        $admin->syncRoles([$data['role_id']]);

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Admin::findOrFail($id);
        $data['roles'] = Role::all();
        return view('panel.admins.create', $data);
    }

    public function update(AdminRequest $request, $id)
    {
        $data = $request->all();
        $admin = Admin::findOrFail($id);

        if (!$request->filled('password')) {
            $data['password'] = $admin->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $admin->update($data);
        $admin->syncRoles([$data['role_id']]);

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        return $admin->delete() ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }




    public function showProfile()
    {
        $data['admin'] = auth('admin')->user();

        return view('panel.profile.create' , $data);
    }

    public function updateProfile(Request $request)
    {
        $admin = auth('admin')->user();
        $data = $request->all();
        $validation = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validation->errors()->first()
            ], StatusCodes::VALIDATION_ERROR);
        }

        if (!$request->filled('password')) {
            $data['password'] = $admin->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $admin->update($data);

        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);

    }
}
