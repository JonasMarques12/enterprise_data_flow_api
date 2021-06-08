<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmClientAddress extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(CrmClient::class);
    }
    
}
