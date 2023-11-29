<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    const SO_CAP = 0;
    const TRNG_cap = 1;
    const CAO_CAP = 2;

    use HasFactory;
    protected $fillable = [
        'name','level','status'
   ];
   protected $primaryKey = 'id';
   protected $table = 'levels';
   public $timestamps = false;
}
