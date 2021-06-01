<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;
    protected $guarded = [];



    public function nam(){
        return $this->hasOne(User::class,'id','user_id');
    }


}
