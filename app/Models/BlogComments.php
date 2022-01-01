<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;
    public $table = "blog_comments";
    
    public $fillable = ['name','comment','blog_id','parent_id'];

    public function replies()
    {
        return $this->hasMany(BlogComments::class, 'parent_id');
    }

}
