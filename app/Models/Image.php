<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $appends=['name'];
    protected $hidden=['mime_type','created_at','updated_at','pivot','deleted_at'];

//    protected static function boot()
//    {
//        parent::boot();
//        static::deleting(function ($instance) {
//            $file = TypeImage::where('file_name',$instance->file_name)->first();
//            if (isset($file)){
//                $file->delete();
//            }
//        });
//    }



    public function getNameAttribute()
    {
        return $this->getOriginal('file_name');
    }

    public static $rules = [
        'image' => 'required'
//        'image' => 'required|mimes:png,gif,jpeg,jpg,bmp,svg,ico,mp4'
    ];

    public static $messages = [
        'image.mimes' => 'الملف الذي تحاول رفعه له صيغة غير مدعومة',
        'image.required' => 'الصورة مطلوبة'
    ];
}
