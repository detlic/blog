<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Image;
use DB;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth',['except'=>['index','show']]);
     }
    public function index()
    {
        //
        $places=Place::orderBy('created_at','desc')->paginate(3);
        return view('places.index')->with('places',$places);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('places.create');
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
        $this->validate($request,[
          'name'=>'required',
          'body'=>'required',
          'filenames' => 'required',

          'filenames.*' => 'mimes:jpeg,png,gif,jpeg'
        ]);

        if($request->hasFile('cover')){
          $covername=$request->file('cover')->getCLientOriginalName();
          $request->file('cover')->move(public_path().'/files/', $covername);

} else {
    $covername = 'images.png';
}
        $place=new Place;
        $place->name=$request->input('name');
        $place->body=$request->input('body');
        $place->user_id=auth()->user()->id;
        $place->cover_image = $covername;
        $place->save();

        if($request->hasfile('filenames'))

         {

            foreach($request->file('filenames') as $file)

            {

                $name=$file->getClientOriginalName();

                $file->move(public_path().'/files/', $name);

                 //$data[] = $name;
                 //$file->filenames=json_encode($data);
                 $file= new Image();
                 $file->place_name=$place->name;
                 $file->image=$name;
                 $file->user_id=auth()->user()->id;

                 $file->save();

            }

         }

         return redirect()->route('places.index')->with('success', 'Data Added');
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
        $place=Place::find($id);
        $name=$place->name;
        $images=DB::table('images')->where('place_name',$name)->get();
        return view('places.show',compact('place','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function addimages(Request $request, $id)
     {
         //
         $place=Place::find($id);

         if($request->hasfile('slike'))

          {

             foreach($request->file('slike') as $file)

             {

                 $name=$file->getClientOriginalName();

                 $file->move(public_path().'/files/', $name);

                  $data[] = $name;
                  //$file->filenames=json_encode($data);
                  $file= new Image();
                  $file->place_name=$place->name;
                  $file->image=$name;
                  $file->user_id=auth()->user()->id;
                //u niz slati slike,tj.name
                  $file->save();

             }
             //$lists=json_encode($data);
            // return redirect('places/id')-with('success','Unete su slike');
          }
          return back();
          //poslati niz
        //  return back()->with('lists',$lists);
     }
    public function edit($id)
    {
        //
        $place= Place::find($id);
        $name=$place->name;

        if(auth()->user()->id!=$place->user_id)
        return redirect('/places')->with('error','Neovlascen pristup');
        return view('places.edit')->with('place',$place);
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
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required'
        ]);
         // Handle File Upload
        if($request->hasFile('cover')){
          $covername=$request->file('cover')->getCLientOriginalName();
          $request->file('cover')->move(public_path().'/files/', $covername);
        }

        $place = Place::find($id);
        $old_name=$place->name;
        if($place->name!=$request->get('name')){
        $place->name = $request->input('name');
        $new_name=$place->name;
        DB::table('images')->where('place_name',$old_name)->update(['place_name' => $new_name]);
      }
      if($place->body!=$request->get('body')){
        $place->body = $request->input('body');
      }
        if($request->hasFile('cover')){
            $place->cover_image = $covername;
        }
        $place->save();
        return redirect('/places')->with('success', 'Izmena');
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
        $place=Place::find($id);
        if(auth()->user()->id!=$place->user_id)
        return redirect('/places')->with('error','Neovlascen pristup');
        DB::table('images')->where('place_name',$place->name)->delete();
        $place->delete();
        return redirect('/places')->with('success','Izbrisano');

}
public function destroy_image($image_id)
{
$image=Image::find($image_id);
/*if(auth()->user()->id!=$image->user_id)
return redirect('/file')->with('error','Neovlascen pristup');*/
$image->delete();
return back()->with('success','Izbrisano');
}

}
