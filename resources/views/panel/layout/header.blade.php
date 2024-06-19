<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-end">


        <!--begin::Topbar-->
        <div class="topbar">


            <!--begin::Languages-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        @if(app()->isLocale('ar'))
                            <img class="h-20px w-20px rounded-sm" src="{{ asset('panelAssets/svg/008-saudi-arabia.svg') }}"
                                 alt=""/>
                        @else
                            <img class="h-20px w-20px rounded-sm" src="{{ asset('panelAssets/svg/226-united-states.svg') }}"
                                 alt=""/>
                        @endif
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="{{ url('lang/en') }}" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="{{ asset('panelAssets/svg/226-united-states.svg') }}"
                                                             alt=""/>
													</span>
                                <span class="navi-text">@lang('translate.en')</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="navi-item active">
                            <a href="{{ url('lang/ar') }}" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="{{ asset('panelAssets/svg/008-saudi-arabia.svg') }}"
                                                             alt=""/>
													</span>
                                <span class="navi-text">@lang('translate.ar')</span>
                            </a>
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Languages-->

            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                     id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">@lang('panel.hello'),</span>
                    <span
                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ auth('admin')->user()->name }}</span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
