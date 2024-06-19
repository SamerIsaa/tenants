@extends('panel.layout.master',['title' => __('panel.site_pages'),'is_active'=>'pages'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.site_pages')</h5>
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
                  id="form" enctype="multipart/form-data">
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


                                @foreach(locales() as $key => $value)

                                    <div class="form-group">
                                        <label>@lang('panel.title')
                                            ({{ __($value) }} )
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="{{ 'title_'.$key }}"
                                               value="{{isset($item)?@$item->translate($key)->title :''}}"
                                               required/>
                                    </div>

                                    <div class="form-group ">
                                        <label for="exampleTextarea">@lang('panel.content')
                                            ({{ __($value) }} )
                                            <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" rows="3"
                                                  name="{{ 'content_'.$key }}"
                                                  required>{{ isset($item)?@$item->translate($key)->content : '' }}</textarea>
                                    </div>

                                @endforeach

                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card card-custom gutter-b">
                            <div class="card-footer">
                                <button type="submit" id="m_login_signin_submit"
                                        class="btn btn-primary mr-2 w-100">{{ __('constants.save') }}</button>
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
    <script src="{{ asset('panelAssets/js/summernote.js') }}"></script>
@endpush
