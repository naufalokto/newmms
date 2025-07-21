<?php

// app/Models/PenggunaAdmin.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenggunaAdmin extends Model
{
    protected $table = 'pengguna_admin';
    protected $primaryKey = 'id_pengguna';
    public $timestamps = false;

    protected $fillable = [
        'id_pengguna',
        'id_cabang',
    ];

    /**
     * Get the pengguna associated with the PenggunaAdmin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }
}

