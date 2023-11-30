<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



    protected $fillable = [
        'name', 'description', 'status'
    ];
    protected $primaryKey = 'id';
    // protected $table = 'categories';
    public $timestamps = false;

    const ACTIVE = 1;
    const INACTIVE = 0;
    public function product()

    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
