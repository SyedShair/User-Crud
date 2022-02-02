<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    function index(){
        return view('library.index');
    }

    function rack_index(){
         $racks = Rack::where('active',1)->get();
        return view('library.rack_index',['racks'=>$racks]);
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
               $notification = array(
                   'message' => 'Rack Added Successfully',
                   'alert-type' => 'success'
               );
               return redirect()->back()->with($notification);
           }
    }
    function rack_edit(Request $request){
        $edit = Rack::where('active',1)->where('id',$request->id)->first();
        $racks = Rack::where('active',1)->get();
        return view('library.rack_index',['edit'=>$edit,'racks'=>$racks]);
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
            $notification = array(
                'message' => 'Rack Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('rack.index')->with($notification);
        }
    }

    function rack_delete(Request $request){
        $del = Rack::where('id',$request->id)->update(['active'=>0]);
        if ($del == true){
            $notification = array(
                'message' => 'Rack Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    function rack_details(){

        $total = DB::select("SELECT COUNT(books.id) as total,racks.rack_name,racks.id FROM racks LEFT JOIN books ON racks.id = books.rack_id where racks.active !=0 || books.active !=0 GROUP BY racks.id,books.rack_id,racks.rack_name ORDER BY racks.id;");

        return view('library.rack_details',compact('total'));
    }
    function rack_items(Request $request){
        $books = Book::where('rack_id',$request->id)->where('active',1)->get();
        return view('library.rack_items',compact('books'));

    }


}
