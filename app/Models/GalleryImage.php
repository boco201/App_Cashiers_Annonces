<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
  use SoftDeletes;

    protected $guarded = [];

    protected $date = ['deleted_at'];

    public static function imageGallery($fileName,$annonce_id)
    {
        if(request()->hasFile($fileName)) {
            foreach(request()->$fileName as $file){
              $filename = rand().'.'.$file->getClientOriginalExtension();
              $newFile = new GalleryImage();
              $newFile->annonce_id= $annonce_id;
              $newFile->gallery_image = $filename;
              if ($newFile->save()) {
                $file->move('image/galleries/', $filename);
              }

            }

        }

    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
