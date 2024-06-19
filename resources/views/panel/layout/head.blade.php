<meta charset="utf-8"/>
<title>{{ $title?? __('translate.app_name') }}</title>
<meta name="description"
      content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<link rel="canonical" href="https://keenthemes.com/metronic"/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<!--end::Fonts-->

<!--begin::Page Vendors Styles(used by this page)-->
@stack('panel_css')
<!--end::Page Vendors Styles-->

<!--begin::Global Theme Styles(used by all pages)-->


@if(app()->isLocale('ar'))
    <link href="{{ asset('panelAssets/css/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/prismjs.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/style.bundle.rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/header/base/light.rtl.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/header/menu/light.rtl.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/brand/light.rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/aside/light.rtl.min.css') }}" rel="stylesheet" type="text/css"/>

@else
    <link href="{{ asset('panelAssets/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/style.bundle.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/header/base/light.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/header/menu/light.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/brand/light.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/themes/layout/aside/light.min.css') }}" rel="stylesheet" type="text/css"/>

@endif

<!--end::Global Theme Styles-->

<!--begin::Layout Themes(used by all pages)-->
<!--end::Layout Themes-->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>

<style>
    .datatable-cell svg {
        width: 50px;
        height: 50px;
    }

    *, html, body {
        font-family: 'droid.Arabic.Kufi';
    }

    .flex-column-fluid {
        flex: 1 !important;
    }

    #kt_aside #kt_aside_menu_wrapper .menu-text {
        text-transform: uppercase;
    }

    label.error {
        color: red;
    }
</style>
