<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter_lession extends Model
{
    use HasFactory;
    protected $fillable = [
        'chapter_id','lession_id'
   ];
   protected $primaryKey = 'id';
   protected $table = 'chapter_lession';
}
