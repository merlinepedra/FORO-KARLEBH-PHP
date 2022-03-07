<?php 

namespace App\Http\Helpers;

class File {
  public function upload($request, $model, $authId = '') {
    
    if ($request->images) {
      foreach ($request->images as $image) {
        
        $img = strtolower(str_replace(' ', '', $image));

        $extension = strrchr($img, '.');

        \App\Models\File::create([
          'fileable_id' => $model->id,
          'fileable_type' => $model::class,
          'extension' => $extension,
          'file' => $img,
          'user_id' => auth()->id(),
        ]);
      }
    }  
  }

}