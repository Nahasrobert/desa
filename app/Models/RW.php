<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;
    protected $fillable = ['rw_id', 'dusun_id', 'nomor_rw'];
    protected $keyType = 'string';
    protected $primaryKey = 'rw_id';
    protected $table = 'rws';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['rw_id'];
}
