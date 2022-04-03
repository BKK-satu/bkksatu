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
}
