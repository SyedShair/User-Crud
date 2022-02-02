<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
      function rack_list(){
          $list = Rack::where('active',1)->get();
          return json_encode(['data'=>$list]);
      }


    function rack_add(Request $request){
        $validator = Validator::make($request->all(),
            [
                'rack_name' => 'required|unique:racks',

            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $save = new Rack();
        $save->rack_name = $request->rack_name;
        $save->save();
        if ($save==true){
            return json_encode(['data'=>$save]);
        }
    }
    function rack_edit(Request $request){
        $edit = Rack::where('active',1)->where('id',$request->id)->first();
        $racks = Rack::where('active',1)->get();
        return json_encode(['edit'=>$edit,'rack'=>$racks]);
    }
    function rack_update(Request $request){
        $validator = Validator::make($request->all(),
            [
                'rack_name' => 'required|unique:racks',

            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $update = new Rack();
        $update->exists = true;
        $update->id = $request->id;
        $update->rack_name = $request->rack_name;
        $update->save();
        if ($update==true){

            return json_encode(['data'=>$update]);
        }
    }

    function rack_delete(Request $request){
        $del = Rack::where('id',$request->id)->update(['active'=>0]);
        if ($del == true){

            return json_encode(['data'=>'Deleted Successfully']);
        }
    }



    function book_list(){
        $books = Book::where('active',1)->get();
        return json_encode(['data'=>$books]);
    }
    function book_add(Request $request){
        $validator = Validator::make($request->all(),
            [
                'book_title' => 'required',
                'author' => 'required',
                'pub_year' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        $check = Book::where('rack_id',$request->rack_id)->where('active',1)->get();
        $save = new Book();
        $save->book_title = $request->book_title;
        $save->author = $request->author;
        $save->pub_year = $request->pub_year;
        $save->rack_id = $request->rack_id;
        if (count($check) > 10){

            return json_encode(['error'=>"Rack Is Full"]);
        }else {
            $save->save();
        }
        if ($save==true){
            return json_encode(['data'=>$save]);
        }
    }
    function book_edit(Request $request){
        $edit = Book::where('active',1)->where('id',$request->id)->first();
        $racks = Rack::where('active',1)->get();
        $books = Book::where('active',1)->get();
        return json_encode(['edit'=>$edit,'racks'=>$racks,'books'=>$books]);
    }
    function book_update(Request $request){
        $validator = Validator::make($request->all(),
            [
                'book_title' => 'required',
                'author' => 'required',
                'pub_year' => 'required',

            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        $update = new Book();
        $update->exists = true;
        $update->id = $request->id;
        $update->book_title = $request->book_title;
        $update->author = $request->author;
        $update->pub_year = $request->pub_year;
        $update->rack_id = $request->rack_id;
        $update->save();
        if ($update==true){
            return json_encode(['data'=>$update]);
        }
    }
    function book_delete(Request $request){
        $del = Book::where('id',$request->id)->update(['active'=>0]);
        if ($del == true){
           return json_encode(['data'=>$del]);
        }
    }
    function books_search(Request $request){
        $books = DB::select("SELECT books.book_title,books.author,books.pub_year,racks.rack_name FROM books LEFT JOIN racks ON books.rack_id = racks.id WHERE books.book_title LIKE '%$request->search%' OR books.author LIKE '%$request->search%' OR books.pub_year LIKE '%$request->search%'  OR racks.rack_name LIKE '%$request->search%';");
        return json_encode(['data'=>$books]);
    }

}
