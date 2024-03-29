<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Validator;

class PromotionsController extends Controller
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
        $items = Promotion::find((integer)$id);
        if ($items) {
            $items->event = $items->event;
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
        $items = Promotion::latest()->paginate(5);
        return response()->json($items, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'required' => 'Das Feld :attribute ist erforderlich.'
        ];
        return Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'event' => 'required|max:255',
            'location' => 'required|max:255',
        ], $messages);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $create = Promotion::create($request->all());
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
        $edit = Promotion::find($id)->update($request->all());
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
        Promotion::find($id)->delete();
        return response()->json(['done']);
    }
}
