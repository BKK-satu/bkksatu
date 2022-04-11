<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni_direkomendasikan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumni_direkomendasikan';

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
        'alumni_id',
        'rekomendasi_id',
    ];

    /**
     * Relation to rekomend with belongsTo
     */
    public function rekomend()
    {
        return $this->belongsTo(Rekomend::class, 'rekomendasi_id', 'id');
    }

    /**
     * Relation to alumni_direkomendasikan table
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}