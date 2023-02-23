<?php

namespace App\Models;

use App\Models\Department;
use App\Models\SubProgramme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'group',
        'category',
        'description',
        'unit_measure',
        'period',
        'quantity',
        'unit_price',
        'total_exclusive',
        'vat',
        'total_inclusive'
    ];

    // programme department relationship 
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // sub programme, proggramme relationship
    public function subprogramme()
    {
        return $this->hasMany(SubProgramme::class);
    }
}
