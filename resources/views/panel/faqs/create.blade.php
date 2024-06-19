@extends('panel.layout.master',['title' =>  __('panel.faq'),'is_active'=>'faqs'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{  __('panel.faq') }}</h5>
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
                                    <label>{{  __('constants.question') }}
                                        ({{ __($value) }} )
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="{{ 'title_'.$key }}" value="{{isset($item)?@$item->translate($key)->title:''}}"
                                           required/>
                                </div>

                                <div class="form-group ">
                                    <label for="exampleTextarea">{{  __('constants.answer') }}
                                        ({{ __($value) }} )
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-control summernote" id="kt_summernote_1" rows="3"
                                              name="{{ 'description_'.$key }}" required>{{ isset($item)?@$item->translate($key)->description : '' }}</textarea>
                                </div>


                            @endforeach



                                <div class="form-group">
                                    <label for="exampleSelect1">@lang('panel.categories')
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control selectpicker" name="faq_category_id"
                                            title="@lang('panel.categories')">
                                        @foreach($faq_categories as $category)
                                            <option value="{{$category->id}}" {{ isset($item) && @$item->faq_category_id ==$category->id ? 'selected' :'' }} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>



                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" id="m_login_signin_submit" class="btn btn-primary mr-2 w-100">{{  __('constants.save') }}</button>
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
