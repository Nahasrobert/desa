<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;
    protected $fillable = ['dusun_id', 'nama_dusun'];
    protected $keyType = 'string';
    protected $primaryKey = 'dusun_id';
    protected $table = 'dusuns';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['dusun_id'];
}
