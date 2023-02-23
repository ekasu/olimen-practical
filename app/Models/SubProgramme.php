<?php

namespace App\Models;

use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProgramme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'programme_id',
        'description',
        'unit_measure',
        'period',
        'quantity',
        'unit_price',
        'total_exclusive',
        'vat',
        'total_inclusive'
    ];

    // sub programme, proggramme relationship
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
