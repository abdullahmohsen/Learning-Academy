<?php

namespace App\Http\Controllers\Front;

use App\Models\Cat;
use App\Models\Course;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function cat($id)
    {
        // $cat = Cat::findOrFail($id);
        // $courses = Course::where('cat_id', $id)->paginate(6);

        // return view('front.courses.cat', [
        //     'cat' => $cat,
        //     'courses' => $courses
        // ]);

        $data['cat'] = Cat::findOrFail($id);
        $data['courses'] = Course::where('cat_id', $id)->paginate(6);
        $data['footer_content'] = SiteContent::select('content')->where('name', 'footer')->first();

        return view('front.courses.cat')->with($data);
    }

    public function show($id, $c_Id)
    {
        // $data['courses'] = Course::where('id', $c_Id)->first();
        $data['course'] = Course::findOrFail($c_Id);
        $data['footer_content'] = SiteContent::select('content')->where('name', 'footer')->first();

        return view('front.courses.show')->with($data);


    }
}
