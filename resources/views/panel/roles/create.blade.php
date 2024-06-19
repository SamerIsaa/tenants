@extends('panel.layout.master',['title' => $title,'is_active'=>'admins'])
@push('panel_css')
    <link rel="stylesheet" href="{{asset('panelAssets/css/custom-style.css')}}">
@endpush

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
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

                            <div class="form-group">
                                <label>@lang('panel.role_name')
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name"
                                       value="{{isset($item)?@$item->name:''}}"
                                       required/>
                            </div>


                            @include('panel.roles.permissions')
                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" id="m_login_signin_submit" class="btn btn-primary mr-2 w-100">{{ __('panel.save') }}
                            </button>
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
    <script>
        $(".checkAll").click(function () {
            $(this).closest('.form-group').find('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
