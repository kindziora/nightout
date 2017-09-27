<?php 

namespace App\Helper;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Image;

class Images
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {

        $validator = Validator::make($request->all(), [
              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        } else {
  
            $image = $request->file('image'); 
            
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
         
            $destinationPath = public_path('/upload/images/thumbnail/' . $request->get('type'));
            $img = Image::make($image->getRealPath());
            
            $img->resize(100, 100, function ($constraint) {
    		    $constraint->aspectRatio();
    		})->save($destinationPath . '/' . $input['imagename']);
    
            $destinationPath = public_path('/upload/images/original/' . $request->get('type'));
            $image->move($destinationPath, $input['imagename']);
            
            return ['errors'=>$validator->errors(), 'images' => $input['imagename']];
 
        }
 
      
    }
    
    public function cleanUp(array $images) {
        
        foreach($images as $image){
             unlink(public_path('/upload/images/original/' . $image));
        }
    }

}