@extends('panel.layout.master',['title' => __('panel.contact_messages'),'is_active'=>'help_center'])

@section('subheader')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('panel.contact_messages')</h5>
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
            <!--begin::Inbox-->
            <div class="d-flex flex-row">


                <div class="flex-row-fluid ml-lg-8" id="kt_inbox_view">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">

                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Header-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap card-spacer-x py-5">
                                <!--begin::Title-->
                                <div class="d-flex align-items-center mr-2 py-2">
                                    <div
                                        class="font-weight-bold font-size-h3 mr-3">@lang('panel.contact_messages')</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->

                            <!--begin::Messages-->
                            <div class="mb-3">
                                <div class="cursor-pointer shadow-xs toggle-on" data-inbox="message">
                                    <div class="d-flex align-items-center card-spacer-x py-6">
                                        <div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
                                            <div class="d-flex">
                                                <a href="#"
                                                   class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">
                                                    {{$item->name}}
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="font-weight-bold text-muted mr-2">{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d g:i A')}}</div>
                                        </div>
                                    </div>
                                    <div class="card-spacer-x py-3 toggle-off-item">
                                        <span style="font-size: 15px;font-weight: bold">@lang('constants.email')</span>
                                        : {{$item->email}}
                                    </div>
                                    <div class="card-spacer-x py-3 toggle-off-item">
                                        <span
                                            style="font-size: 15px;font-weight: bold">@lang('constants.message')</span>
                                        : {{$item->message}}
                                    </div>
                                </div>

                                @foreach($item->replies as $replay)

                                    <div class="cursor-pointer shadow-xs toggle-off" data-inbox="message">
                                        <div class="d-flex align-items-center card-spacer-x py-6">
                                            <div class="d-flex align-items-center">
                                                <div class="font-weight-bold text-muted mr-2"
                                                     data-toggle="expand">{{diff_for_humans($replay->created_at)}}</div>
                                            </div>
                                        </div>
                                        <div class="card-spacer-x py-3">
                                            {!! $replay->message !!}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!--end::Messages-->


                            <!--begin::Reply-->
                            <div class="card-spacer mb-3">
                                <div class="card card-custom shadow-sm">
                                    <div class="card-body p-0">
                                        <!--begin::Form-->
                                        <form method="POST" action="{{ route('panel.help-center.inbox.add-replay') }}" to="{{ url()->current() }}"
                                              class="form-horizontal" enctype="multipart/form-data"
                                              id="form">
                                            @csrf
                                    <!--begin::Body-->
                                        <div class="d-block">
                                            <!--begin::To-->
                                            <input type="hidden" name="contact_id" value="{{ $item->id }}">
                                            <div
                                                class="d-flex align-items-center border-bottom inbox-to px-8 min-h-50px">
                                                <div class="text-dark-50 w-75px">@lang('constants.to'):</div>
                                                <div class="d-flex align-items-center flex-grow-1">
                                                    <input type="text" class="form-control border-0"
                                                           name="compose_to" disabled
                                                           value="{{$item->email}}"/>
                                                </div>
                                            </div>
                                            <!--end::To-->

                                            <!--begin::Message-->
                                            <textarea class="summernote" id="kt_summernote_1"
                                                      name="message"></textarea>
                                            <!--end::Message-->
                                        </div>
                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        <div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-top">
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center mr-3">
                                                <!--begin::Send-->
                                                <div class="btn-group mr-4">
                                                    <button type="submit" id="m_login_signin_submit"
                                                            class="btn btn-primary font-weight-bold px-6">
                                                        @lang('constants.send_now')
                                                    </button>
                                                    <!--end::Send-->
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                        </div>
                                        <!--end::Footer-->
                                    <form>
                                    <!--end::Form-->
                                    </div>
                                </div>
                                <!--end::Reply-->
                            </div>


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>

            </div>
            <!--end::Inbox-->


        </div>
        <!--end::Container-->
    </div

@endsection

@push('panel_js')

    <script src="{{asset('panelAssets/js/summernote.js')}}"></script>
    <script src="{{asset('panelAssets/js/post.js')}}"></script>

@endpush
