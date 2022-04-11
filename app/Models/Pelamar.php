<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelamar';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Membuat timestamps tidak automatis.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'lowongankerja_id',
        'tanggal_submit',
    ];

    /**
     * Relation to alumni table
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    /**
     * Relation to alumni_daftar table
     */
    public function alumni_daftar()
    {
        return $this->hasOne(Alumni_mendaftar_pelamar::class);
    }

    /**
     * Relation to loker with belongsTo
     */
    public function loker()
    {
        return $this->hasOne(Loker::class, 'id', 'lowongankerja_id');
    }

    /**
     * Relation to seleksi_pelamar table
     */
    public function seleksi_pelamar()
    {
        return $this->hasMany(Seleksi_pelamar::class, 'pelamar_id', 'id');
    }
}