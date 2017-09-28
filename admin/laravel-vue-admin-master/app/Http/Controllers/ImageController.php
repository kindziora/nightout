<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Helper\Images;
 

class ImageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $img = new Images();
        return response()->json($img->upload($request));
      
    }
    
    public function get(Request $request)
    {
        $getParams = $request->all();
        $img = new Images();
        $imageData = $img->resize($getParams['name'], [$getParams['w'], $getParams['h']]);
        return response($imageData)->header('Content-type','image/png');
    }
}