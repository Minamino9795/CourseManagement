<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','level','status'
   ];
   protected $primaryKey = 'id';
   protected $table = 'levels';
   public function course()

   {
       return $this->hasMany(Course::class, 'level_id', 'id');
   }
}
