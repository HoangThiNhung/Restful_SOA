<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';

    protected $fillable = ['code','name','image', 'author','publisher','publish_year','pages','field'];
}
