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
            
        	$img->resize(300, 300, function ($constraint) {
    		    $constraint->aspectRatio();
    		})->save(public_path('/upload/images/300x/' . $request->get('type')) . '/' . $input['imagename']);
            
            $img->resize(100, 100, function ($constraint) {
    		    $constraint->aspectRatio();
    		})->save($destinationPath . '/' . $input['imagename']);
    		
            $destinationPath = public_path('/upload/images/original/' . $request->get('type'));
            
            $image->move($destinationPath, $input['imagename']);
            
            return ['errors'=>$validator->errors(), 'images' => $input['imagename']];
 
        }
        
    }
    
    /**
     * deliver resized image or generate one
     */
    public function resize($imagename, array $size, $mode = null) {

        $path = public_path('/upload/images/original/' . $imagename);
        $folder = public_path("/upload/images/{$size[0]}x{$size[1]}");
        $finalPath = "$folder/{$imagename}";
        
        if(file_exists($finalPath)){
           return Image::make($finalPath)->stream();
        }
        
        if(!is_dir($folder)){
            mkdir($folder, 0775);
        }

    	return Image::make($path)->resize($size[0], $size[1], function ($constraint) {
		    $constraint->aspectRatio();
		})->save($finalPath)->stream();
         
    }
    
    public function cleanUp(array $images) {
        foreach($images as $image){
             unlink(public_path('/upload/images/original/' . $image));
        }
    }

}