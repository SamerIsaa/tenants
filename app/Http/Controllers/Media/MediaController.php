<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MediaController extends Controller
{


    public function photo($folder , $path , $size = null)
    {

        $path = storage_path("app/$folder/".$path);
        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);


        if ($size != null){
            $size = explode('x' , $size);
            if(is_numeric($size[0]) && is_numeric($size[1])){
                $width = $size[0];
                $height = $size[1];
                $manager = new ImageManager(new Driver());

                $image = $manager->read($file)->cover($width, $height);
                $response = Response::make($image->encode());

                $response->header("CF-Cache-Status", 'HIF');
                $response->header("Cache-Control", 'max-age=604800, public');
                $response->header("Content-Type", $type);

                return $response;
            }else{
                abort(404);
            }
        }else{
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $response = Response::make($image->encode());

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;
        }
    }

    public function getPhoto($path , $size = null)
    {

        $path = storage_path("app/uploads/images/".$path);

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);


        if ($size != null){
            $size = explode('x' , $size);
            if(is_numeric($size[0]) && is_numeric($size[1])){
                $width = $size[0];
                $height = $size[1];
                $manager = new ImageManager(new Driver());

                $image = $manager->read($file)->cover($width, $height);
                $response = Response::make($image->encode());

                $response->header("CF-Cache-Status", 'HIF');
                $response->header("Cache-Control", 'max-age=604800, public');
                $response->header("Content-Type", $type);

                return $response;
            }else{
                abort(404);
            }
        }else{
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $response = Response::make($image->encode());

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;
        }
    }

    public function getQuran($path , $size = null)
    {

        $path = storage_path("app/uploads/quran/".$path);

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);


        if ($size != null){
            $size = explode('x' , $size);
            if(is_numeric($size[0]) && is_numeric($size[1])){
                $width = $size[0];
                $height = $size[1];
                $manager = new \Intervention\Image\ImageManager(['driver' => 'imagick']);
                $image = $manager->read($file)->fit($width, $height, function ($constraint) {
                    $constraint->upsize();
                });

                $response = Response::make($image->encode($image->mime), 200);

                $response->header("CF-Cache-Status", 'HIF');
                $response->header("Cache-Control", 'max-age=604800, public');
                $response->header("Content-Type", $type);

                return $response;
            }else{
                abort(404);
            }
        }else{
            $manager = new \Intervention\Image\ImageManager(['driver' => 'imagick']);
            $image = $manager->read($file);

            $response = Response::make($image->encode($image->mime), 200);

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;
        }
    }


    public function video($folder, $path)
    {
        $path = storage_path("app/$folder/".$path);

        $video = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($video, 200);

        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');
        $response->header('Content-Type', $type);
        return $response;


    }

    public function getAudio($folder , $audio)
    {
        $path = storage_path("app/uploads/$folder/".$audio);
        $audio = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($audio, 200);

        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');
        $response->header('Content-Type', $type);
        return $response;


    }


}
