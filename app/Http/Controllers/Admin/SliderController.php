<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Admin\Slider;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index')->with('sliders', $sliders)->with('title', 'Снимки в слайда');
    }

    public function create()
    {
        return view('admin.slider.create')->with('title', 'Добавяне на снимка в слайда');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'img_file' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if($request->hasFile('img_file'))
        {
            $file_pic = $request->file('img_file');
            $extension = $file_pic->getClientOriginalExtension();
            $fileNameToStore = 'slider_'.time().'.'.$extension;
            Storage::makeDirectory('public/common_pictures/');
            $image = Image::make($file_pic->getRealPath());
            $path = storage_path('app/public/common_pictures/'. $fileNameToStore);
            $image->resize(1000, 250)->save($path);
        }

        $slider = new Slider;
        $slider->slider_img  = $fileNameToStore;
        $slider->title       = $request->input('img_title');
        $slider->description = $request->input('img_description');
        $slider->save();

        session()->flash('notif', 'Снимката за слайда е създадена');
        return redirect('admin/slider/create');

    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit')->with('slider', $slider)->with('title', 'Обновяване на снимката');
    }

    public function update(Request $request, $id)
    {
       // $this->validate($request, [
         //   'img_file' => 'required|image|mimes:jpeg,png,jpg',
        //]);

        if($request->hasFile('img_file'))
        {
            $slider = Slider::find($id);
           
            Storage::delete('public/common_pictures/'.$slider->slider_img);
           
            $file_pic = $request->file('img_file');
           
            $extension = $file_pic->getClientOriginalExtension();
           
            $fileNameToStore = 'slider_'.time().'.'.$extension;
           
            Storage::makeDirectory('public/common_pictures/');
           
            $image = Image::make($file_pic->getRealPath());
           
            $path = storage_path('app/public/common_pictures/'. $fileNameToStore);
           
            $image->resize(1000, 250)->save($path);
        }
        else
        {
        	$fileNameToStore = $request->input('img_name');
        
        }

        $slider = Slider::find($id);
        $slider->slider_img  = $fileNameToStore;
        $slider->title       = $request->input('img_title');
        $slider->description = $request->input('img_description');
        $slider->save();

        session()->flash('notif', 'Снимката за слайда е обновена');

        return redirect('admin/slider');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        Storage::delete('public/upload_pictures/'.$slider->slider_img);
        $slider->delete();

        return redirect('/admin/slider');
    }
}
