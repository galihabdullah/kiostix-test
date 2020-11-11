<?php

namespace App\Models;

use App\Lib\Database;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['name'];
    protected $table ="kategori";
}