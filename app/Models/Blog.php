<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $table = "blog";
    
    public $fillable = ['title','author','description'];

    public function comments()
    {
        return $this->hasMany(BlogComments::class)->whereNull('parent_id');
    }
}
