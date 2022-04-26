<?php 

namespace App\Http\Helpers;

use Illuminate\Support\Facades\App;


class File {
  public function upload($request, $model, $authId = '') {

    if ($request->images) {
      foreach ($request->images as $image) {

        $img = strtolower(str_replace(' ', '', $image));

        $extension = strrchr($img, '.');

        if (App::environment('production')) {
          cloudinary()->upload($image, null);
          $imageUrl= cloudinary()->show(cloudinary()->getPublicId(), ["width" => 1000, "height"=> 1000]);
        }

        \App\Models\File::create([
          'fileable_id' => $model->id,
          'fileable_type' => $model::class,
          'file_url' => $imageUrl ?? '',
          'extension' => $extension,
          'file' => $img,
          'user_id' => auth()->id(),
        ]);
      }
    }  
  }

}