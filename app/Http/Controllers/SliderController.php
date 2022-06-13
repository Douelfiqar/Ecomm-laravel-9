<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    
    public function allSlider(){
        
        $user = Auth::user();
        return view('admin.Slider.allSlider',compact('user'));
    }

    public function getSliders(){

        $Sliders = Slider::all();

        return response()->json(['sliders'=>$Sliders]);
    }

    public function addSlider(Request $request){

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;

        $file = $request->file('slider_img');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/slider'),$filename);
        $slider['slider_img'] = $filename;
        $slider->save();
        return redirect()->back();
    }

    public function statusUpdate($id){

        
        $slider = Slider::find($id);

        if($slider->status == 1){
            $sliderStatus = 0;
        }else{
            $sliderStatus = 1;
        }

        $slider->update([
                'status' => $sliderStatus
        ]);

        return response()->json(['data','status has been updated']);
    }


    public function deleteSlider($id){

        $slider = Slider::find($id);
        $slider->delete();
        return response()->json(['data','deleted']);
    }

    public function updateSlider($id){

        $slider = Slider::find($id);
        return view('admin.Slider.updateSlider',compact('slider'));
    }

    public function editSlider(Request $request){
        $id = $request->id;

        $slider = Slider::find($id);

        if($request->slider_img){
            unlink('upload/sliderPhoto/'.$slider);
            $file = $request->file('slider_img');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/sliderPhoto/'),$filename);

            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $filename
            ]);
        }else{
            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('admin.allSlider');

    }
}
