<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    // Define fillable attributes
    protected $fillable = ['tittle', 'photo', 'category_id', 'author', 'desc'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
