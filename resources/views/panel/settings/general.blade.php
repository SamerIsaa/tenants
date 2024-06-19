@extends('panel.layout.master' , ['title' => __('panel.general_settings') , 'is_active' => 'settings'])


@push('panel_css')

    <link rel="stylesheet" href="{{ asset('panelAssets/css/jquery.tagsinput.css') }}">
    <style>

        div.tagsinput span.tag {
            float: right;
            list-style: disc outside none;
        }

        div.tagsinput div {
            float: right;
        }

        div.tagsinput span.tag {
            border: 1px solid #2c2e3e;
            background: #2c2e3e;
            color: #ffffff;
        }

        div.tagsinput span.tag a {
            color: #ffffff;
        }
    </style>
@endpush


@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.general_settings')</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection

@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->

            <form method="POST" action="{{ url()->current() }}" to="{{ url()->current() }}" class="form-horizontal"
                  id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="row">
                    <div class="col-md-8">
                        <!--begin::Card-->

                        <div class="card card-custom">
                            <!--begin::Card header-->
                            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                        <!--begin::Item-->
                                        <li class="nav-item mr-3">
                                            <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                                <span
                                                    class="nav-text font-size-lg">@lang('panel.general_settings')</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mr-3">
                                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
                                                <span class="nav-text font-size-lg">@lang('panel.social_media')</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mr-3">
                                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                                                <span
                                                    class="nav-text font-size-lg">@lang('panel.contact_details')</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body">
                                <div class="tab-content">
                                    <!--begin::Tab-->
                                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="col-xl-12 my-2">


                                                @foreach(locales() as $key => $locale)
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.site_name') ({{ $locale }})
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="title_{{$key}}"
                                                                type="text"
                                                                value="{{$settings->valueOf('title_'.$key)}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.site_description') ({{ $locale }})
                                                        </label>
                                                        <div class="col-9">
                                                    <textarea class="form-control form-control-lg form-control-solid"
                                                              name="description_{{$key}}">{{$settings->valueOf('description_'.$key)}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.keywords') ({{ $locale }})
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                id="tags_{{$key}}" name="tags_{{$key}}"
                                                                type="text"
                                                                value="{{$settings->valueOf('tags_'.$key)}}"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.copy_rights') ({{ $locale }})
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="copyright_{{$key}}"
                                                                type="text"
                                                                value="{{$settings->valueOf('copyright_'.$key)}}"/>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Tab-->
                                    <!--begin::Tab-->
                                    <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="col-xl-12 my-2">
                                                <div class="my-2">

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.facebook')
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="facebook" type="text"
                                                                value="{{$settings->valueOf('facebook')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.twitter')
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="twitter"
                                                                type="text" value="{{$settings->valueOf('twitter')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.instagram')
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="instagram"
                                                                type="text" value="{{$settings->valueOf('instagram')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.youtube')
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="youtube"
                                                                type="text" value="{{$settings->valueOf('youtube')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.linkedin')
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="linkedin"
                                                                type="text" value="{{$settings->valueOf('linkedin')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Tab-->
                                    <!--begin::Tab-->
                                    <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <div class="col-xl-12 my-2">

                                                    @foreach(locales() as $key => $language)
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-left text-right">
                                                                @lang('panel.address') ({{ $language }})
                                                            </label>
                                                            <div class="col-9">
                                                                <input
                                                                    class="form-control form-control-lg form-control-solid"
                                                                    name="{{ 'address_' . $key }}"
                                                                    type="text"
                                                                    value="{{$settings->valueOf('address_' . $key )}}"/>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.email')                                                    </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="email"
                                                                type="text" value="{{$settings->valueOf('email')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.phone')
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="phone"
                                                                type="text" value="{{$settings->valueOf('phone')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-3 text-lg-left text-right">
                                                            @lang('panel.fax')
                                                        </label>
                                                        <div class="col-9">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid text-right"
                                                                name="fax"
                                                                type="text" value="{{$settings->valueOf('fax')}}"
                                                                style="direction: ltr"/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab-->

                                </div>
                            </div>
                            <!--begin::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-md-4">


                        <div class="card card-custom gutter-b">
                            <div class="card-footer">
                                <button type="submit" id="m_login_signin_submit"
                                        class="btn btn-primary mr-2 w-100">@lang('panel.save')
                                </button>
                            </div>
                        </div>


                        <div class="card card-custom gutter-b">
                            <div class="card-footer">

                                <input type="hidden" id="startLat" name="latitude"
                                       value="{{ $settings->valueOf('latitude')??"29.378586" }}">
                                <input type="hidden" id="startLon" name="longitude"
                                       value="{{ $settings->valueOf('longitude')??"47.990341" }}">

                                <div id="map" style="height: 350px;"></div>
                            </div>
                        </div>

                    </div>

                </div>


                <form>

                    <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

@endsection

@push('panel_js')
    <script>

        $(document).ready(function () {

            var GoogleMapsDemo = {
                init: function () {
                    var location = {lat: parseFloat($('#startLat').val()), lng: parseFloat($('#startLon').val())};
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: location,
                        zoom: 15,
                    });
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,

                    });


                    google.maps.event.addListener(marker, 'position_changed', function () {
                        var lat = marker.getPosition().lat();
                        var lng = marker.getPosition().lng();
                        $('#startLon').val(lng);
                        $('#startLat').val(lat);
                    });
                }
            };
            jQuery(document).ready(function () {
                GoogleMapsDemo.init()
            });
        });

    </script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAIiPJXATL1VQa0KhqL9eWDo834B6v9O2M"
            type="text/javascript"></script>
    <script src="{{ asset('panelAssets/js/gmaps.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script src="{{ asset('panelOld/js/jquery.tagsinput.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('#tags_ar').tagsInput({
                width: 'auto',
                defaultText: 'كلمات مفتاحية'
            });
            jQuery('#tags_en').tagsInput({
                width: 'auto',
                defaultText: 'KeyWords'
            });
        });


        $('#m_login_signin_submit').click(function (e) {
            $('form#form').attr('to', ($('form#form').attr('action') + $('.nav-link.active').attr('href')));
        })

    </script>
@endpush
