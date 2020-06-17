<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

Class Annonce extends Model
{  
    use Notifiable;
    use SoftDeletes;
        
        protected $fillable = [
            'category_id', 'particulier_id','user_id', 'title', 'content', 'image', 'price', 'premiums',
        ];

        protected $date = ['deleted_at'];
    
    
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
    
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        public function gallery_images()
        {
            return $this->hasMany(GalleryImage::class);
        }
    
        public function path()
        {
            return url("/site/annonces/show/{$this->id}-".Str::slug($this->title));
        }
    
        public static function image($fileName,$category)
        {
            if (request()->hasfile($fileName)) {
                $file = request()->file($fileName);
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('image/products/', $filename);
                $category->image = $filename;
                # code...
            }
        }
    
        public function particulier()
        {
            return $this->belongsTo(Particulier::class);
        }
}


