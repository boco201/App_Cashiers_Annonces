<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professionnel extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];

    protected $fillable = [
        'category_id', 'pro_id', 'user_id', 'title', 'content', 'image', 'price', 'premium',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pro()
    {
        return $this->belongsTo(Pro::class);
    }

    public static function image($fileName,$category)
    {
        if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/professionnels/', $filename);
            $category->image = $filename;
            # code...
        }
    }

    public function path()
    {
        return url("/site/professionnels/pros/{$this->id}-".Str::slug($this->title));
    }

}
