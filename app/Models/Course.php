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
   public $timestamps = false;
   const ACTIVE = 1;
    const INACTIVE = 0;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
