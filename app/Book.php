<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class Book extends Model
{
    //
    protected $primaryKey='id';
    protected $table = 'books';

    protected $fillable = ['code','name','image', 'author','publisher','publish_year','pages','field','description'];


    public static function updateBook($id){

    	$data = Request::all();

    	return DB::update('update `books` set `code` = :code,`name` = :name,`image` = :image,`author` = :author,`publisher` = :publisher,`publish_year` = :publish_year,`pages` = :pages,`field` = :field, where id = :id',    ['code'=>$data['code'],'name'=>$data['name'],'image'=>$data['image'],'author'=>$data['author'],'publisher'=>$data['publisher'],'publish_year'=>$data['publish_year'],'pages'=>$data['pages'],'field'=>$data['field'],'id'=>$id]);

    }
}
