<?php

namespace App\Http\Controllers\Media;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class ImageHandler  {

    public function getPublicImage($size, $id){
        $path = storage_path('app/uploads/images/'.$id);

        if(!File::exists($path))
            $path = storage_path('app/uploads/images/placeholder.png');

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);
        if ($type=='image/svg'){
            return $file;
        }
        $sizes = explode("x", $size);

        if(is_numeric($sizes[0]) && is_numeric($sizes[1])){

            $manager = new ImageManager(new Driver());

            $image = $manager->read($file)->cover($sizes[0], $sizes[1]);
            $response = Response::make($image->encode());

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);
            return $response;

        }else { abort(404); }
    }

    public function getImageResize($size, $id){
        $path = storage_path('app/uploads/images/'.$id);

        if(!File::exists($path))
            $path = storage_path('app/uploads/images/default_image.jpg');

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);
        if ($type=='image/svg'){
            return $file;
        }
        if(is_numeric($size)){

            $manager = new ImageManager(new Driver());
            $image = $manager->read( $file );


            $height = $image->height();
            $width = $image->width();
            if($width > $height){
                $new_height = (($height * $size)/$width);
                $image = $image->cover($size, $new_height);
            }else{
                $new_width = (($width * $size)/$height);
                $image = $image->cover($new_width, $size);
             }

            $response = Response::make($image->encode());

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;

        }else { abort(404); }
    }

    public function getDefaultImage($id){
        $path = storage_path('app/uploads/images/'.$id);

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        if ($type=='image/svg'){
            return $file;
        }
        $manager = new ImageManager(new Driver());
        $image = $manager->read( $file );

        $response = Response::make($image->encode());
        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');
        $response->header("Content-Type", $type);

        return $response;

    }
}
