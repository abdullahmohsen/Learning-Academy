<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Course;
use App\Models\Cat;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::select('id', 'name', 'price', 'img')
        ->orderBy('id', 'DESC')->get();
        return view('admin.courses.index')->with($data);
    }

    public function create()
    {
        $data['cats'] = Cat::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        return view('admin.courses.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        // dd($data);

        $new_name_img = $data['img']->hashName(); //bet3ml hashing l name image
        Image::make($data['img'])->resize(970, 520)->save(public_path('uploads/courses/'. $new_name_img));
        $data['img'] = $new_name_img;

        Course::create($data);
        return redirect(route('admin.course.index'));
    }

    public function edit($id)
    {
        $data['cats'] = Cat::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        $data['course'] = Course::findOrFail($id);
        return view('admin.courses.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:225',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'cat_id' => 'required|exists:cats, id',
            'trainer_id' => 'required|exists:trainers, id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        //esm el sora el adem
        $old_name_img = Course::findOrFail($request->id)->img;

        //Lw el request feh file img
        if($request->hasFile('img'))
        {
            //hams7 el sora el adema mn el folder w a7ot maknha el sora el gdeda w a3ml save ll esm el gded fel database
            Storage::disk('uploads')->delete('courses/'. $old_name_img);

            $new_name_img = $data['img']->hashName(); //bet3ml hashing l name image
            Image::make($data['img'])->resize(970, 520)->save(public_path('uploads/courses/'. $new_name_img));
            $data['img'] = $new_name_img;
        }
        else
        {
            //ha7tafez bel esm el adem fel database
            $data['img'] = $old_name_img;
        }
        Course::findOrFail($request->id)->update($data);
        return redirect(route('admin.trainer.index'));
    }

    public function delete($id)
    {
        $old_name_img = Course::findOrFail($id)->img;
        Storage::disk('uploads')->delete('courses/'. $old_name_img);

        Course::findOrFail($id)->delete();
        return back();
    }
}

