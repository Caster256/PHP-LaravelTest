<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadFileController extends Controller
{
    public function index()
    {
        return View('site.upload_file');
    }

    public function stroeData(Request $request)
    {
        //$path = $request->photo->store('images');
        //$path = Input::file('photo')->getRealPath();
        /*if($request->hasFile('file_name')){

            $file = request('file_name');

            //Display File Name
            echo 'File Name: '.$file->getClientOriginalName();
            echo '<br>';

            //Display File Extension
            echo 'File Extension: '.$file->getClientOriginalExtension();
            echo '<br>';

            //Display File Real Path
            echo 'File Real Path: '.$file->getRealPath();
            echo '<br>';

            //Display File Size
            echo 'File Size: '.$file->getSize();
            echo '<br>';

            //Display File Mime Type
            echo 'File Mime Type: '.$file->getMimeType();

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        }*/
        //$file = $request->file('file_name');
        $file = $request->file_name;
        echo $file;
        $path = $request->file_name->storeAs('uploads', 'test.jpeg');
        print_r($path);
        return redirect('upload_file');
    }
}
