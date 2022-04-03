<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persyaratan';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Membuat timestamps tidak automatis.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Give data requirements.
     */
    public function loker()
    {
        return $this->belongsTo(Loker::class, 'lowongankerja_id', 'id');
    }

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'lowongankerja_id',
        'text',
    ];
}