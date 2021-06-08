<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmClient extends Model
{
    use HasFactory;

    public function address(){
        return $this->hasOne(CrmClientAddress::class);
    }
}
