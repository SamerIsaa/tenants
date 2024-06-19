@extends('panel.layout.master',['title' => __('panel.slider_text') , 'is_active' => 'sliders'])

@section('content')
    @php
        $item = isset($item) ? $item: null;
    @endphp
    <!--begin::Container-->
    <div class="container">


        <form method="POST" action="{{ url()->current() }}" to="{{ url()->current() }}" class="form-horizontal"
              id="form" enctype="multipart/form-data">
            @if(isset($item))
                @method('PUT')
            @endif


            <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">@lang('panel.slider_text')</h3>

                    </div>
                    <!--begin::Form-->
                    <div class="card-body">


                        @foreach(locales() as $key=>$language)


                            <div class="form-group row">
                                <label
                                    class="col-2 col-form-label">{{__('constants.title')}}  {{ " ( $language ) " }}</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" placeholder="{{__('constants.title')}}" required
                                           name="slider_title_{{$key}}"
                                           value="{{ $settings->valueOf('slider_title_' . $key) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-2 col-form-label">{{__('constants.colored_title')}}  {{ " ( $language ) " }}</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" placeholder="{{__('constants.colored_title')}}" required
                                           name="slider_colored_title_{{$key}}"
                                           value="{{ $settings->valueOf('slider_colored_title_' . $key) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">{{__('constants.description')}}   {{ " ( $language ) " }}</label>
                                <div class="col-10">
                                    <textarea class="form-control" type="text"
                                              placeholder="{{__('constants.description')}}" required
                                              name="slider_description_{{$key}}">{{ $settings->valueOf('slider_description_' . $key) }}</textarea>
                                </div>
                            </div>



                        @endforeach


                    </div>

                    <!--end::Form-->
                </div>
                <!--end::Card-->


                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-footer">
                        <button type="submit" id="m_login_signin_submit" class="btn btn-primary">{{__('constants.save')}}
                        </button>
                        <a href="{{ route('panel.index') }}"
                           class="btn btn-secondary">{{__('constants.back')}}</a>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Card-->


            </div>
        </div>

        <form>

    </div>
    <!--end::Container-->
@stop

@push('panel_js')
    <script src="{{asset('panelAssets/js/post.js')}}"></script>
@endpush
