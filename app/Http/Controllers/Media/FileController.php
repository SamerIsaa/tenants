<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Logic\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    protected $file;

    public function __construct(FileRepository $fileRepository)
    {
        $this->file = $fileRepository;
    }


    public function upload_file(Request $request)
    {
//        dd('ggg');
        $photo = $request->all();
        $response = $this->file->upload($photo, 'file');
        return $response;
    }

    public function delete_file(Request $request)
    {
        $filename = $request->id;
        if (!$filename) {
            return 0;
        }
        $response = $this->file->delete($filename);

        return $response;
    }

    public function deleteUploadUser()
    {

        $filename = request('id');

        if (!$filename) {
            return 0;
        }

        $response = $this->file->deleteUser($filename);

        return $response;
    }

    /**
     * Part 2 - Display already uploaded files in Dropzone
     */


    public function getServerFiles()
    {
        $files = \App\Models\File::select('id', 'title', 'filename', 'display')->where('status', 0)->latest('id')->get();

        $fileAnswer = [];

        foreach ($files as $file) {
            $path = storage_path('app/uploads/files/' . $file->filename);
            $fileAnswer[] = [
                'file_id' => $file->id,
                'name' => $file->filename,
                'filename' => $file->filename,
                'title' => $file->title,
                'display' => $file->display,
                'size' => \App\Models\File::size($path)
            ];
        }

        return response()->json([
            'files' => $fileAnswer
        ]);
    }


    public function show($file)
    {
        $path = storage_path('app/uploads/files/' . $file);
        if (!File::exists($path)) abort(404);

        $type = File::mimeType($path);

        $headers = [
            'Cache-Control' => 'nocache, no-store, max-age=0, must-revalidate',
            'Pragma', 'no-cache',
            'Expires', 'Fri, 01 Jan 1990 00:00:00 GMT',
        ];

        return response()
            ->file($path)
            ->sendHeaders($headers);
    }

}
