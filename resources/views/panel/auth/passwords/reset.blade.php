<!DOCTYPE html>
<html @if(app()->isLocale('ar')) lang="ar" dir="rtl" @endif>
<head>
    @include('landing.layouts.head' , ['title' => __('translate.password_reset')])
</head>
<body>
<!-- begin:: Page -->
<div class="main-wrapper">
    <!-- begin:: loader-page -->
    <div class="loader-page">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- end:: loader-page -->
    <div class="mobile-menu-overlay"></div>
    <!-- begin:: header -->
@include('landing.layouts.header')
<!-- end:: navigation -->

    <div class="section-register">
        <div class="container-fluid full-height">
            <div class="row row-height">
                <div class="col-lg-6 content-right d-none d-lg-block">
                    <div class="content-right-wrapper">
                        <div>
                            <figure><img class="img-fluid" src="{{ asset('frontAssets/images/image-res.png') }}" alt="" /></figure>
                        </div>
                        <div class="copy">{{ $settings->valueOf('copyright_'. app()->getLocale() ) }}</div>
                    </div>
                    <!-- /content-left-wrapper-->
                </div>
                <div class="col-lg-6 content-left">
                    <div class="content-left-wrapper">
                        <div class="regsiter-header">
                            <h3>@lang('translate.password_reset')</h3>
                        </div>
                        {!! Form::open(['method'=>'POST', 'url'=> route('user.auth.password.reset') , 'class' => 'form-resetPass' , 'id'=>'form']) !!}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <div class="input-icon">
                                <input class="form-control" type="text" name="email"
                                       value="{{ @$email }}" placeholder="@lang('translate.email')" />
                                <div class="input-icon__icon"><i class="icon-envelope-2"></i></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <input class="form-control" type="password" name="password" placeholder="@lang('translate.password')" />
                                <div class="input-icon__icon"><i class="icon-lock-alt"></i></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="@lang('translate.password_confirmation')" />
                                <div class="input-icon__icon"><i class="icon-lock-alt"></i></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="general_btn_lg" type="submit">@lang('translate.password_reset')</button>
                        </div>
                        <div class="form-group text-center">
                            <h6>@lang('translate.remember_data')<a class="ml-2" href="{{ route('user.auth.login') }}">@lang('translate.login')</a></h6>
                        </div>
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- end:: Page -->
@include('landing.layouts.scripts')

<script>

    var form = $('#form');

    $('#form').validate({
        rules: {
            email: { required: true, email:true},
            password: {required: true,},
        },
        messages: {
            email: { required: '', email:'' },
            password: { required: ''},
        },
        submitHandler: function (f, e) {
            e.preventDefault();
            var url = form.attr('action');
            var _method = form.attr('method');
            var formData = new FormData(form[0]);
            var save_btn = $(form).find('.general_btn_lg');

            save_btn.html('<i class="fa fa-spinner fa-pulse fa-fw"></i>').attr("disabled", !0);


            $.ajax({
                url: url,
                method: _method,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    window.location = response.redirect;
                },
                error: function (jqXhr) {
                    save_btn.html('@lang('translate.reset_password')').attr("disabled", !1);
                    toastr.error(jqXhr.responseJSON.msg)
                }
            });

        }
    })
</script>
</body>
</html>
