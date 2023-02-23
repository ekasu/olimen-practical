<?php

namespace App\Models;

use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'period', 'amount', 'description'];


    //department programme relationship 
    public function programme()
    {
        return $this->hasMany(Programme::class);
    }
}
