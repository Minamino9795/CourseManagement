<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id','role_id'
   ];
   protected $primaryKey = 'id';
   protected $table = 'group_role';
}
