<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //$fillable can be mass assigned using Eloquent's create and update
    protected $fillable = ['title', 'body'];
}
