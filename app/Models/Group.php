<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name'
   ];
   protected $primaryKey = 'id';
   protected $table = 'groups';


   public function users()
   {
       return $this->hasMany(User::class);
   }
   public function roles()
    {
        return $this->belongsToMany(Role::class,'group_role','group_id','role_id');
    }
}
