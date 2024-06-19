<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

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
        'file' => 'required:mimes:pdf,rtf,docx,xsxl'
//        'image' => 'required|mimes:png,gif,jpeg,jpg,bmp,svg,ico,mp4'
    ];

    public static $messages = [
        'file.mimes' => 'الملف الذي تحاول رفعه له صيغة غير مدعومة',
        'file.required' => 'الملف مطلوبة'
    ];}
