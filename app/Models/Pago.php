<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';

    protected $primaryKey = 'proptar';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'proptar',
        'numtar',
        'cvv',
        'fecha',
    ];

    protected $dates = [
        'fecha',
    ];
}
