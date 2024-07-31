<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function ProfileImage(){
        return $this->image ? '/storage/'.$this->image : 'storage/profile/0zsmdOjLcILukVvzGqrbybkADz9yY2tbwl3Eta77.jpg';
    }
    public function user(){
       return $this->belongsTo(User::class);
    }
}
