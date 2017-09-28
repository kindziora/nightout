<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Helper\Images;

class EventsController extends Controller
{
    public function index(){
        return view('index');
    }

    ///AJAX STUFF

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $items = Event::find((integer)$id);
        return response()->json($items, 200,['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $items = Event::latest()->paginate(5);
        return response()->json($items, 200,['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = new Images();
        $imgResult = $img->upload($request);
        
        if(!empty($imgResult['errors']->getMessages())){
            return response()->json($imgResult['errors'], 500);
        }
        
        $data = $request->all();
        $data['images'] = json_encode([$imgResult['images']]);
        
        $validator = Event::validate($data);
        
        if($validator->fails()) {
            $create = $validator->validate();
            $img->cleanup([$imgResult['images']]);
            
            return response()->json($create, 500);
        }else{
            $create = Event::create($data);
        }
        
        return response()->json($create);
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
        $img = new Images();
        $imgResult = $img->upload($request);
        
        if(empty($imgResult['errors']->getMessages())){
            $edit = Event::find($id)->update($request->all() + ['images' => $imgResult['images']]);
        }
        
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return response()->json(['done']);
    }
 
}
