<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmodel extends Model
{
    use HasFactory;

    protected $table='tbbook';
    protected $fillable = ['bookid','bookname','author','image','price'];
}
