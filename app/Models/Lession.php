<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'content',
        'image_url',
        'video_url',
        'duration',
   ];
   protected $primaryKey = 'id';
   protected $table = 'lessions';
   public $timestamps = false;
   public function chapters()
   {
       return $this->belongsToMany(Chapter::class, 'chapter_lession');
   }
  // Lession.php
public function course()
{
    return $this->belongsTo(Course::class, 'course_id', 'id');
}

}