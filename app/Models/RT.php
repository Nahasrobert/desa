<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $fillable = ['rt_id', 'rw_id', 'nomor_rt'];
    protected $keyType = 'string';
    protected $primaryKey = 'rt_id';
    protected $table = 'rts';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['rt_id'];
}
