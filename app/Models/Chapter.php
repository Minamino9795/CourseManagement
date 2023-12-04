<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','course_id'
   ];
   protected $primaryKey = 'id';
   protected $table = 'chapters';
   public $timestamps = false;
   public function course()
   {
       return $this->belongsTo(Course::class);
   }

   public function lessions()
   {
       return $this->belongsToMany(Lession::class, 'chapter_lession');
   }
}
   