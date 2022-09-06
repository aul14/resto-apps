<?php

namespace App\Models;

use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $dates = [
        'res_date'
    ];

    public function Table()
    {
        return $this->belongsTo(Table::class);
    }
}
