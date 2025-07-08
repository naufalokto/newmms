<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    protected $table = 'type_service';
    protected $primaryKey = 'id_tipe_service';
    public $timestamps = false;

    protected $fillable = [

        'nama_service',
        'deskripsi',
    ];
}
