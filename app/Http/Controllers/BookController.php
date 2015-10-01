<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use Response;
use DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::get();
        // return view('page.index');
        return Response::json(array(
            'books' => $books->toArray()),
            200,
            array('Access-Control-Allow-Origin' => '*')
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.book.add_newBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->all();

        if(isset($data['image'])){
            $thumb  = $data['image'];
            $new = 'books' . uniqid() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move('upload/books' , $new);
        }
        $data['image'] = $new;

        Book::create($data);

        return Response::json(array(
            'message'=>'created new book done'),
            200,
            array('Access-Control-Allow-Origin' => '*')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::find($id);
        return Response::json(array(
            'books'=>$book->toArray()),
        200,
        array('Access-Control-Allow-Origin' => '*')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Request::all();
        if(isset($data['image'])){
            $thumb  = $data['image'];
            $new = 'books' . uniqid() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move('upload/books' , $new);
        }
        $data['image'] = $new;

        Book::where('id',$id)->update(array(
            'code'=>$data['code'],
            'name'=>$data['name'],
            'image'=>$data['image'],
            'author'=>$data['author'],
            'publisher'=>$data['publisher'],
            'publish_year'=>$data['publish_year'],
            'pages'=>$data['pages'],
            'field'=>$data['field'],
        ));

        return Response::json(array(
            'message'=>'Book Updated'),
        200,
        array('Access-Control-Allow-Origin' => '*')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = Book::find($id)->toArray();
        Book::find($id)->delete();
        File::delete('upload/books/' . $model['image'] );

        return Response::json(array(
            'message'=>'Book deleted'),
        200,
        array('Access-Control-Allow-Origin' => '*')
        );
    }

    public function listCategories()
    {
        //$users = DB::table('users')->select('name', 'email as user_email')->get();

        $listCategory = DB::table('books')->select('field')->distinct()->get();

        return Response::json(array(
            'listCategory' => $listCategory),
            200,
            array('Access-Control-Allow-Origin' => '*')
        );


    }
    public function category($field){
        $book = Book::where('field',$field)->get();

        return Response::json(array(
            'book' => $book->toArray()),
            200,
            array('Access-Control-Allow-Origin' => '*')
        );
    }
}
