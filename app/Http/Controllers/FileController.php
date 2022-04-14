<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use Illuminate\Support\Facades\File as Files;
use Intervention\Image\Facades\Image;


class FileController extends Controller
{

  public function filepondUpload()
  {
    if (request()->hasFile('images')) {

      $files = request()->file('images');

      foreach($files as $file) {
        $name = strtolower($file->getClientOriginalName());
        $fileName = str_replace(' ', '', $name);
        $file->storeAs('uploads', $fileName);
        $image = Image::make("uploads/{$fileName}")->resize(1000, 1000)->save();

        //This solves symlink and storage path larvel wahala
        // $img = $file->storeAs('uploads', $fileName, 'public');
        // $image = Image::make(storage_path() . "/app/public/uploads/{$fileName}")->fit(1000, 1000)->save();
      }
      return $fileName;
    } else {
      return '';
    }

  }  

  public function delete($id)
  {
    $file = File::findOrFail($id);
    $file->delete();
    return Files::delete(storage_path() . '/app/public/uploads/' . $file->file) ? 'success' : 'failure';
  } 

  public function dropzoneUpload()
  {
    if (request()->hasFile('dropzone')) {

      $folder = uniqid() . '-' . now()->timestamp;
      $file = request()->file('dropzone');
      $fileName = $file->getClientOriginalName();
      $file->storeAs('avatars/' . $folder, $fileName);

      return $folder;      
    } else {
      return '';
    }
  }

}
