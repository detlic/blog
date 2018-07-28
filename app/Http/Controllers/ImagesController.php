<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Place;
use DB;
class ImagesController extends Controller
{
    //
  /*  public function index()
{
  $images = DB::table('images')
            ->join('places', 'images.place_id', '=', 'places.id')
            ->join('places', 'images.user_id', '=', 'places.user_id')
            ->select('images.title','images.name')
            ->get();
  return view('places.index',compact('images'));
}*/
//
public function index()
{
$images = Image::get();
return view('image_upload',compact('images'));
}
public function create()

{

   return view('create');

}
public function store(Request $request)

{



    $this->validate($request, [

            'filenames' => 'required',

            'filenames.*' => 'mimes:jpeg,png,gif,jpeg'

    ]);



    if($request->hasfile('filenames'))

     {

        foreach($request->file('filenames') as $file)

        {

            $name=$file->getClientOriginalName();

            $file->move(public_path().'/files/', $name);

             //$data[] = $name;
             //$file->filenames=json_encode($data);
             $file= new Image();

             $file->image=$name;
             $file->user_id=auth()->user()->id;
             $file->place_id=Session::get('id');
             $file->save();

        }

     }



    /* $file= new File();

     $file->filenames=json_encode($data);

     $file->save();*/



    return back()->with('success', 'Data Your files has been successfully added');

}
public function destroy($image_id)
{
$image=Image::find($image_id);
/*if(auth()->user()->id!=$image->user_id)
return redirect('/file')->with('error','Neovlascen pristup');*/
$image->delete();
return back()->with('success','Izbrisano');
}
}
