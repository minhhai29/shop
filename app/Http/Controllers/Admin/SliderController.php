<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderService $slider){
        $this->slider = $slider;
    }
    public function create(){
        return view("admin.slider.add",[
            'title'=>'Thêm Slider mới'

        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required'
        ]);
        $this->slider->insert($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.slider.listt',[
            'title'=> 'Danh sách Slider',
            'slider'=>$this->slider->get()
        ]);
    }
    public function show(Slider $slider){
        return view('admin.slider.edit',[
            'title'=> 'Chỉnh sửa Slider',
            'slider'=>$this->slider->get()
        ]); 
}
    public function update(Request $request,Slider $slider){
        $this->validate($request,[
            'name'=> 'required',
            'thumb'=> 'required',
            'url'=> 'required'
        ]);
        $result=$this->slider->update($request,$slider);
        if($result){
            return redirect('/admin/slider/listt');
    }
    return redirect()->back();
}
public function destroy(Request $request){
    $result= $this->slider->destroy($request);
    if($result){
        return response()->json([
            'error'=> false,
            'message'=> 'Xóa thành công slider'
        ]);
    }
    return response()->json(['error'=>true]);
}
}