<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomend extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rekomendasi';

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
        'judul',
        'text',
        'status',
        'created_at'
    ];

    /**
     * Relation to alumni_direkomend with belongsTo
     */
    public function alumni_direkomend()
    {
        return $this->hasOne(Alumni_direkomendasikan::class, 'rekomendasi_id', 'id');
    }

    /**
     * Relation to loker with belongsTo
     */
    public function loker()
    {
        return $this->hasOne(Loker::class, 'id', 'lowongankerja_id');
    }
}