<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'produk_status';
    protected $primaryKey = 'id_produk_status';

    protected $fillable = [
        'status',
    ];
}
