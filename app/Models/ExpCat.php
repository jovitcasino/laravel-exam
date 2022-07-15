<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses;

class ExpCat extends Model
{
    use HasFactory;

    public function expenses(){
        return $this->hasMany(Expenses::class, 'expcat_id', 'id');
    }
}
