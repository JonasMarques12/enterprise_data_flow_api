<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGroup extends Model
{
    use HasFactory;

    public function subGroups(){
        return $this->belongsTo(Group::class);
    }
}
