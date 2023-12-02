<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
        'category_id',
        'level_id',
        'image_url',
        'video_url'
   ];
   protected $primaryKey = 'id';
   protected $table = 'courses';
}