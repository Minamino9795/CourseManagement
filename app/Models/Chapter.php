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
   
}
