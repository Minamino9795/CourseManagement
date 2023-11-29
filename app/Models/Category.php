<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const ACTIVE = 0;
    const INACTIVE= 1;
    
    protected $fillable = [
         'name','description','status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'categories';
    public $timestamps = false;

   

}
