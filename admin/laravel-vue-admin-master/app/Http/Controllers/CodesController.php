<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Validator;

class CodesController extends Controller
{
    public function index()
    {
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
        $items = Code::find((integer)$id);
        if ($items) {
            $items->promotion = $items->promotion;
        }
        return response()->json($items, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $items = Code::latest()->paginate(5);
        return response()->json($items, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Code::create($request->all());
        return response()->json($create);
    }

    /**
     * generate newly created resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        for($i = 0; $i < $request->all()['limit']; $i++){

              $created[] = Code::create(array(
                  "value" => $i . substr(uniqid(), -6),
                  "promotion_id" => $request->all()['promotion'],
                  "used" => 0,
                  "valid" => 1
              ));
        }
        return response()->json($created);
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
        $edit = Code::find($id)->update($request->all());
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
        Code::find($id)->delete();
        return response()->json(['done']);
    }
}
