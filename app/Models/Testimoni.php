<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    public $timestamps = false;

    protected $fillable = [
        'id_pengguna',
        'id_service',
        'isi_testimoni',
        'menyoroti'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
        
    }


    // public function service()
    // {
    //     return $this->belongsTo(Service::class, 'id_service', 'id_service');
    // }
}