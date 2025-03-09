<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Galleries;
use App\Models\Categories;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'category_id',
        'user_id',
        'title',
        'description',
        'is_publish',
    ];


    public function Gallery()
    {
        return $this->belongsTo(Galleries::class);
    }


    public function Category()
    {
        return $this->belongsTo(Categories::class);
    }

}
