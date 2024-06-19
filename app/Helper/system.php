<?php

use App\Logic\ImageRepository;
use App\Models\Image;
use \Illuminate\Http\Request;
use \Carbon\Carbon;
use \Illuminate\Support\Str;

function stringNumberToInteger($string) {
    return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
}

function filterDataTable($items, $resource, Request $request, $relations = [])
{
    $pagination = $request->pagination;
    $items = $items->with($relations);

    if ($pagination['perpage'] == -1 || $pagination['perpage'] == null) {
        $pagination['perpage'] = 10;
    }
    $itemsCount = $items->count();
    $items = $items->take($pagination['perpage'])->skip($pagination['perpage'] * ($pagination['page'] - 1))->get();
    $pagination['total'] = $itemsCount;
    $pagination['pages'] = ceil($itemsCount / $pagination['perpage']);
    $data['meta'] = $pagination;
    $data['data'] = $resource->collection($items);
    return $data;
}

function filterDataTableVendor($items, $resource, Request $request, $relations = [])
{


    $length = $request->get('length');
    $start = $request->get('start');
    $search = $request->get('search');
//    $search = $search['value'];

    $items = $items->with($relations);


    $data['iTotalRecords'] = $items->count();
    $data['iTotalDisplayRecords'] = $items->count();
    $data['sEcho'] = 0;
    $data['sColumns'] = '';
    $items = $items->take($length);
    if ($length > 0) {
        $items = $items->skip($start);
    }

    $items = $items->take($length)->skip($length * $start)->get();
    $data['data'] = $resource->collection($items);
    return $data;
}

function locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('translate.' . $key);
    }
    return $arr;
}

function replace_space_str($str)
{
    return str_replace(' ', '-', $str);
}

function lang_url($url)
{
    return url(app()->getLocale() . '/' . $url);
}


function uploadImage($request, $parameter_name = 'file')
{
    $photo = $request[$parameter_name];
    $extension = $photo->getClientOriginalExtension();
    $filename = 'image_' . time() . mt_rand();
    $repo = new ImageRepository();
    $allowed_filename = $repo->createUniqueFilename($filename, $extension);
    $uploadSuccess1 = $repo->original($photo, $allowed_filename);
    $originalName = str_replace('.' . $extension, '', $photo->getClientOriginalName());
    if (!$uploadSuccess1) {
        return response()->json([
            'error' => true,
            'message' => 'Server error while uploading',
        ], 500);
    }
    $image = new Image();
    $image->display_name = $originalName . '.' . $extension;
    $image->file_name = $allowed_filename;
    $image->mime_type = $extension;
    $image->size = $photo->getSize();
    $image->save();
    return $image;
}

function uploadFile($request, $parameter_name = 'file')
{
    $photo = $request[$parameter_name];
    $extension = $photo->getClientOriginalExtension();
    $filename = 'file_' . time() . mt_rand();
    $repo = new \App\Logic\FileRepository();
    $allowed_filename = $repo->createUniqueFilename($filename, $extension);
    $uploadSuccess1 = $repo->original($photo, $allowed_filename);
    $originalName = str_replace('.' . $extension, '', $photo->getClientOriginalName());
    if (!$uploadSuccess1) {
        return response()->json([
            'error' => true,
            'message' => 'Server error while uploading',
        ], 500);
    }
    $file = new \App\Models\File();
    $file->display_name = $originalName . '.' . $extension;
    $file->file_name = $allowed_filename;
    $file->mime_type = $extension;
    $file->size = $photo->getSize();
    $file->save();
    return $file;
}

function image_url($img, $size = '')
{
    return (!empty($size)) ? url('images/' . $img . '/' . $size) : url('images/' . $img);
}

function file_url($file)
{
    return url('file/' . $file);
}


function getLocal()
{
    return app()->getLocale();
}

function diff_for_humans($date)
{
    return Carbon::parse($date)->diffForHumans();
}

function has_caliber_data($id)
{
    return in_array($id, [4, 5]);
}

function available_genders()
{
    return 'male,female,other';
}


function generate_6_digit_code()
{
    return "000000";
//    return rand(100000, 999999);
}

function sendMessage($mobile, $content)
{
    $url = 'http://api.unifonic.com/wrapper/sendSMS.php?userid=it@theonedeals.com&password=hussain1993&msg=' . $content
        . '&sender=TheOneDeals&to=' . $mobile . '&encoding=UTF8';

// https://api.unifonic.com/wrapper/sendSMS.php?userid=it@theonedeals.com&password=hussain1993
// &msg=hello&sender=TheOneDeals&to=971545360564&encoding=UTF8


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $query = curl_exec($ch);
    curl_close($ch);


//        return file_get_contents($url);
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }
    return $bytes;
}


function getCategoryClildsIds($category_id)
{
    $ids = \App\Models\FaqCategory::query()->where('id', $category_id)->orWhere('parent_id', $category_id)
        ->pluck('id')->toArray();
    return $ids;
}

function card_number($number)
{
    $masked = str_pad(substr($number, -4), strlen($number), '*', STR_PAD_LEFT);
    return chunk_split($masked, 4, ' ');
}

function order_delivery_methods()
{
    return 'hama,hand_by_hand';
}

function create_searial_number()
{
    $last_order_number = @\App\Models\Order::query()->latest()->first()->order_number;
    if ($last_order_number != null) {
        $serial = $last_order_number + 1;
        $serial = sprintf("%00000007d", $serial);
    } else {
        $serial = 0000001;
        $serial = sprintf("%00000007d", $serial);
    }
    return $serial;
}

function str_limit($str , $limit , $end = '...'){
    return Str::limit($str , $limit , $end);
}

function product_option_types(){

    return [
        'dropdown' => __('translate.dropdown'),
        'checkbox' => __('translate.checkbox'),
        'multiselect' => __('translate.multiselect'),
        'radio' => __('translate.radio'),
    ];
}
function uuid(){
    return Str::uuid();
}
?>
