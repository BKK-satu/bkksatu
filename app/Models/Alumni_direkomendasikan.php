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
     * Relation to rekomend with hasMany
     */
    // public function rekomend()
    // {
    //     return $this->hasOne(Rekomend::class);
    // }

    /**
     * Relation to alumni_direkomendasikan table
     */
    // public function alumni()
    // {
    //     return $this->belongsTo(Alumni::class);
    // }
}