<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExpCat;

class Expenses extends Model
{
    use HasFactory;

    public function expcat(){
        return $this->belongsTo(ExpCat::class);
    }
}
