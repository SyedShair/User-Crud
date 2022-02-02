<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    function book_index(){
        $books = Book::where('active',1)->get();
        $racks = Rack::where('active',1)->get();
        return view('library.book',['books'=>$books,'racks'=>$racks]);
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
            $notification = array(
                'message' => 'Sorry This Rack is Full So You can not add more items ',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }else {
            $save->save();
        }
        if ($save==true){
            $notification = array(
                'message' => 'Book Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    function book_edit(Request $request){
        $edit = Book::where('active',1)->where('id',$request->id)->first();
        $racks = Rack::where('active',1)->get();
        $books = Book::where('active',1)->get();
        return view('library.book',['edit'=>$edit,'racks'=>$racks,'books'=>$books]);
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
            $notification = array(
                'message' => 'Book Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('book.index')->with($notification);
        }
    }

    function book_delete(Request $request){
        $del = Book::where('id',$request->id)->update(['active'=>0]);
        if ($del == true){
            $notification = array(
                'message' => 'Book Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    function books_search(Request $request){

          $books = DB::select("SELECT books.book_title,books.author,books.pub_year,racks.rack_name FROM books LEFT JOIN racks ON books.rack_id = racks.id WHERE books.book_title LIKE '%$request->search%' OR books.author LIKE '%$request->search%' OR books.pub_year LIKE '%$request->search%'  OR racks.rack_name LIKE '%$request->search%';");

        return view('library.search',compact('books'));
    }

}
