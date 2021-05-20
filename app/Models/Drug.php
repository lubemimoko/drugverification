<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

   protected $fillable = ["drugName", "logo", "companyID", "nafdac","expiring_date", "manufacturing_date"];

    public function company(){
        return $this->belongsTo(User::class);
    }
    
    public function complains(){
        return $this->hasMany(Complain::class, "drugID", " ");
    }
}