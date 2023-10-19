<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_user extends Model
{
    use HasFactory;
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username','password','role'];
    public $timestamps = false;
}
