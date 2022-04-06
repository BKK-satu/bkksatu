<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lowongankerja';

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
     * Get the requirements.
     */
    public function requirement()
    {
        return $this->hasMany(Requirement::class);
    }

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'mitra_id',
        'jurusan_id',
        'title',
        'kategori',
        'jenis_pekerjaan',
        'posisi',
        'kuota',
        'lokasi_kerja',
        'deskripsi',
        'gaji',
        'kedaluwarsa',
        'tanggal_posting',
        'banner',
        'status'
    ];

    /**
     * Relation to alumni_direkomendasikan table
     */
    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}