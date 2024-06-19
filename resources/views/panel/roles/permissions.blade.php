<div class="form-group">
    <fieldset>
        <legend>
            <div class="checkbox-inline">
                <label class="checkbox checkbox-success">
                    <input type="checkbox"
                           class="checkAll mx-2 " {{isset($item) && @$item->hasAllDirectPermissions(['manage_roles'])?'checked':''}}/>
                    <span></span>@lang('permissions.roles.name')
                </label>
            </div>
        </legend>
        <div class="form-group row">
            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('manage_roles')?'checked':''}} value="manage_roles"/>
                        <span></span>@lang('permissions.roles.perm.manage_roles')
                    </label>
                </div>
            </div>

        </div>
    </fieldset>
</div>


<div class="form-group">
    <fieldset>
        <legend>
            <div class="checkbox-inline">
                <label class="checkbox checkbox-success">
                    <input type="checkbox"
                           class="checkAll mx-2 " {{isset($item) && @$item->hasAllDirectPermissions(['add_admins' , 'show_admins'])?'checked':''}}/>
                    <span></span>@lang('permissions.admins.name')
                </label>
            </div>
        </legend>
        <div class="form-group row">
            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('add_admins')?'checked':''}} value="add_admins"/>
                        <span></span>@lang('permissions.admins.perm.add_admins')
                    </label>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('show_admins')?'checked':''}} value="show_admins"/>
                        <span></span>@lang('permissions.admins.perm.show_admins')
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
</div>


<div class="form-group">
    <fieldset>
        <legend>
            <div class="checkbox-inline">
                <label class="checkbox checkbox-success">
                    <input type="checkbox"
                           class="checkAll mx-2 " {{isset($item) && @$item->hasAllDirectPermissions([ 'manage_inbox'])?'checked':''}}/>
                    <span></span>{{ __('permissions.help_center.name') }}
                </label>
            </div>
        </legend>

        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('manage_inbox')?'checked':''}} value="manage_inbox"/>
                        <span></span>{{ __('permissions.help_center.perm.manage_inbox') }}
                    </label>
                </div>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <fieldset>
        <legend>
            <div class="checkbox-inline">
                <label class="checkbox checkbox-success">
                    <input type="checkbox"
                           class="checkAll mx-2 " {{isset($item) && @$item->hasAllDirectPermissions([ 'manage_blogs' ,'manage_pages' , 'manage_faq' , 'manage_settings'])?'checked':''}}/>
                    <span></span>{{ __('permissions.constants.name') }}
                </label>
            </div>
        </legend>

        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('manage_blogs')?'checked':''}} value="manage_blogs"/>
                        <span></span>{{ __('permissions.constants.perm.manage_blogs') }}
                    </label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('manage_faq')?'checked':''}} value="manage_faq"/>
                        <span></span>{{ __('permissions.constants.perm.manage_faq') }}
                    </label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('manage_pages')?'checked':''}} value="manage_pages"/>
                        <span></span>{{ __('permissions.constants.perm.manage_pages') }}
                    </label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="permissions[]"
                               {{isset($item) && @$item->hasPermissionTo('manage_settings')?'checked':''}} value="manage_settings"/>
                        <span></span>{{ __('permissions.constants.perm.manage_settings') }}
                    </label>
                </div>
            </div>

        </div>
    </fieldset>
</div>


{{--<!-------------------------------التذاكر ----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2 " {{isset($item) && @$item->hasPermission(['show_tickets'])?'checked':''}}> التذاكر--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]"   {{isset($item) && @$item->hasPermission(['show_tickets'])?'checked':''}} value="show_tickets" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------المواقع ----------------------------------->--}}
{{--<div class="form-group">--}}

{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2"  {{isset($item) && @$item->hasPermission(['show_websites'])?'checked':''}}>المواقع--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]"  {{isset($item) && @$item->hasPermission(['show_websites'])?'checked':''}} value="show_websites" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}

{{--</div>--}}

{{--<!-------------------------------انواع المواقع ----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_siteType'])?'checked':''}}>انواع المواقع--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_siteType'])?'checked':''}} value="show_siteType" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------انواع المواقع ----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_coupons'])?'checked':''}}>الكوبونات--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_coupons'])?'checked':''}} value="show_coupons" type="checkbox"> ادارة الكوبونات--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2"--}}
{{--                        {{isset($item) && @$item->hasPermission([ 'show_site_statistics', 'show_questions','show_features', 'show_slider_section' , 'show_lastSites', 'show_customerOpinions', 'show_partners', 'show_siteCategory'])?'checked':''}} >مكونات الموقع--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_slider_section'])?'checked':''}}  value="show_slider_section" type="checkbox"> السلايدر--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_siteRate'])?'checked':''}}  value="show_siteRate"   type="checkbox"> معدل الموقع--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_site_statistics'])?'checked':''}}  value="show_site_statistics"   type="checkbox"> أرقام نفخر بها--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_features'])?'checked':''}}  value="show_features"   type="checkbox"> المميزات--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}


{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_questions'])?'checked':''}}  value="show_questions" type="checkbox"> المميزات--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_questions'])?'checked':''}} value="show_questions" type="checkbox"> الأسئلة الشائعة--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_lastSites'])?'checked':''}} value="show_lastSites" type="checkbox"> اخر المواقع--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}


{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_customerOpinions'])?'checked':''}} value="show_customerOpinions" type="checkbox"> أراء عملاؤنا--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_partners'])?'checked':''}} value="show_partners" type="checkbox"> شركاؤنا--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}


{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_siteCategory'])?'checked':''}} value="show_siteCategory" type="checkbox"> تصنيفات الموقع--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_categoriesTemplates' , 'show_templates'])?'checked':''}}>القوالب--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_categoriesTemplates'])?'checked':''}} value="show_categoriesTemplates" type="checkbox"> تصنيفات القوالب--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_templates'])?'checked':''}} value="show_templates" type="checkbox"> القوالب--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------مكتبة الشروحات  ----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_annotationsLibrary'])?'checked':''}}>مكتبة الشروحات--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_annotationsLibrary'])?'checked':''}} value="show_annotationsLibrary" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------المستخدمين----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_users'])?'checked':''}}>المستخدمين--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}

{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_users'])?'checked':''}} value="show_users" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------الاضافات----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_extensions','show_webSiteExtension'])?'checked':''}}>الإضافات--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_extensions'])?'checked':''}} value="show_extensions" type="checkbox"> الكل--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_webSiteExtension'])?'checked':''}} value="show_webSiteExtension" type="checkbox"> الاشتراكات--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------الخطوط ----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_fonts'])?'checked':''}} >الخطوط--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_fonts'])?'checked':''}} value="show_fonts" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------الالوان ----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_fonts'])?'checked':''}} >الالوان--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_colors'])?'checked':''}} value="show_colors" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<!-------------------------------الباقات----------------------------------->--}}
{{--<div class="form-group">--}}

{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_packages' , 'show_usersPackage'])?'checked':''}}>الباقات--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_packages'])?'checked':''}} value="show_packages" type="checkbox"> الكل--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_usersPackage'])?'checked':''}} value="show_usersPackage" type="checkbox"> الاشتراكات--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}

{{--<!-------------------------------الثوابت ----------------------------------->--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_categories'])?'checked':''}}>الثوابت--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_categories'])?'checked':''}} value="show_categories" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_inbox'])?'checked':''}}>البريد الوارد--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_inbox'])?'checked':''}} value="show_inbox" type="checkbox"> عرض--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['manage_icons'])?'checked':''}}>الايقونات--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['manage_icons'])?'checked':''}} value="manage_icons" type="checkbox">  ادارة الايقوانات--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_bank_accounts' ,'show_banks' , 'show_banks_transfers'])?'checked':''}}>المعاملات المالية--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_bank_accounts'])?'checked':''}} value="show_bank_accounts" type="checkbox">  ادارة الحسابات البنكية--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_banks'])?'checked':''}} value="show_banks" type="checkbox">  ادارة البنوك--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_banks_transfers'])?'checked':''}} value="show_banks_transfers" type="checkbox">  ادارة التحويلات البنكية--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll mx-2" {{isset($item) && @$item->hasPermission(['show_work_steps'])?'checked':''}}>واجهة الموقع--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" {{isset($item) && @$item->hasPermission(['show_work_steps'])?'checked':''}} value="show_work_steps" type="checkbox">  ادارة كيف نعمل--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}
