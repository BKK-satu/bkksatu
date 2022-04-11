<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni_mendaftar_pelamar extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumni_mendaftar_pelamar';

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
        'pelamar_id',
    ];

    /**
     * Relation to alumni table
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    /**
     * Relation to pelamar table
     */
    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}