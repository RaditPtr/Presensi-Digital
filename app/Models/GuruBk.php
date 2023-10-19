<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruBk extends Model
{
    use HasFactory;
    protected $table = 'guru_bk';
    protected $primaryKey = 'id_bk';
    protected $fillable = ['id_guru'];
    public $timestamps = false;
}
