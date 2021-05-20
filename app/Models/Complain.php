<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complain extends Model
{
    use HasFactory;
    protected $table="complain";
    protected $fillable = ["drugID", "reason", "sideEffect", "effective", "alergies", "addictive", "addressOfSale", "status"];

    public function drug(){
        return $this->belongsTo(Drug::class, "drugID", "id");
    }
}
