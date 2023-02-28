<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartNumber extends Model
{
    use SoftDeletes;
//    protected $table = 'part_numbers';
//    protected $primaryKey = 'id';

// se utiliza para poder hacer llenado de la tabla con la funcion create()
protected $fillable = [
    'sheet_name',
    'part_numbers',
];
    use HasFactory;
}
