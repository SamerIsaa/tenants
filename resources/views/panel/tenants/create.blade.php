@extends('panel.layout.master',['title' => __('panel.tenants'),'is_active'=>'tenants'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.tenants')</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection

@section('content')
    @php
        $item = isset($item) ? $item: null;
    @endphp
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <form method="POST" action="{{ url()->current() }}" to="{{ url()->current() }}" class="form-horizontal"
                  id="form">
                @csrf
                @if(isset($item))
                    @method('PUT')
                @endif

            <div class="row">
                <div class="col-md-8">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b ">

                        <!--begin::Form-->
                        <div class="card-body">

{{--                            <div class="form-group">--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-2 col-form-label">@lang('constants.image')</label>--}}

{{--                                    <div class="col-9">--}}
{{--                                        <div class="image-input image-input-empty image-input-outline"--}}
{{--                                             id="kt_user_edit_avatar"--}}
{{--                                             style="background-image: url('{{ isset($item) ? image_url(@$item->avatar) :  image_url('avatar.png') }}')">--}}
{{--                                            <div class="image-input-wrapper"></div>--}}
{{--                                            <label--}}
{{--                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
{{--                                                data-action="change" data-toggle="tooltip" title=""--}}
{{--                                                data-original-title="Change">--}}
{{--                                                <i class="fa fa-pen icon-sm text-muted"></i>--}}
{{--                                                <input type="file" name="file" accept=".png, .jpg, .jpeg"/>--}}
{{--                                                <input type="hidden" name="profile_avatar_remove"/>--}}
{{--                                            </label>--}}
{{--                                            <span--}}
{{--                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
{{--                                                data-action="cancel" data-toggle="tooltip" title="Cancel">--}}
{{--                                            <i class="ki ki-bold-close icon-xs text-muted"></i>--}}
{{--                                        </span>--}}
{{--                                            <span--}}
{{--                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
{{--                                                data-action="remove" data-toggle="tooltip" title="Remove">--}}
{{--                                            <i class="ki ki-bold-close icon-xs text-muted"></i>--}}
{{--                                        </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}




                            <div class="form-group">
                                <label>@lang('constants.name')<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('constants.name')" name="name"
                                       value="{{@$item->name}}" required/>
                            </div>


                            <input type="hidden" name="domain_id" value="{{@$domain->id}}">
                            <div class="form-group">
                                <label>@lang('constants.domain')
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('constants.domain')" name="domain"
                                       value="{{@$domain->domain}}" required/>
                            </div>


{{--                            <div class="form-group">--}}
{{--                                <label>@lang('constants.mobile')<span class="text-danger">*</span></label>--}}
{{--                                <input type="text" class="form-control" placeholder="@lang('constants.mobile')" name="mobile"--}}
{{--                                       value="{{@$item->mobile}}" required/>--}}
{{--                            </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label>@lang('constants.password')--}}
{{--                                    @if(!isset($item))--}}
{{--                                        <span class="text-danger">*</span>--}}
{{--                                    @endif--}}
{{--                                </label>--}}
{{--                                <input type="password" class="form-control" placeholder="@lang('constants.password')" name="password"/>--}}
{{--                            </div>--}}

                        </div>
                    </div>
                    <!--end::Card-->
                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2 w-100">@lang('constants.save')</button>
                        </div>
                    </div>
                </div>

            </div>
            <form>

        </div>
        <!--end::Container-->
    </div>

@endsection

@push('panel_js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script src="{{asset('panelAssets/js/edit-user.js')}}"></script>
@endpush
