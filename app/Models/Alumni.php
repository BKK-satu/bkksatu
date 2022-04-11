<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumni';

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
        'jurusan_id',
        'angkatan_id',
        'user_id',
        'nama',
        'nis',
        'nisn',
        'tanggal_lahir',
        'gender',
        'agama',
        'alamat',
        'no_telp',
        'berat_badan',
        'tinggi_badan',
        'bio',
        'foto'
    ];

    /**
     * Relation to user table
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation to jurusan table
     */
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    /**
     * Relation to angakatan table
     */
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    /**
     * Relation to pelamar table
     */
    public function pelamar()
    {
        return $this->hasMany(Pelamar::class);
    }

    /**
     * Relation to alumni_daftar table
     */
    public function alumni_daftar()
    {
        return $this->hasMany(Alumni_mendaftar_pelamar::class);
    }

    /**
     * Relation to alumni_rekomend table
     */
    public function alumni_rekomend()
    {
        return $this->hasMany(Alumni_direkomendasikan::class);
    }

    /**
     * Relation to seleksi_pelamar table
     */
    public function seleksi_pelamar()
    {
        return $this->hasMany(Seleksi_pelamar::class, 'alumni_id', 'id');
    }
}