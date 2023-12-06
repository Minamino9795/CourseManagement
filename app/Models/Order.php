<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id', 'user_id', 'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'orders';
    const ACTIVE = 1;
    const INACTIVE = 0;
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }
    public function course()
    {
        return $this->belongsToMany(Product::class, 'course_id', 'id');
    }
}
