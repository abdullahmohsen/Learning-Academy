<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SiteContent;
use App\Models\Student;
use App\Models\Test;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $data['banner'] = SiteContent::select('content')->where('name', 'banner')->first();
        $data['features_content'] = SiteContent::select('content')->where('name', 'features')->first();
        $data['courses_content'] = SiteContent::select('content')->where('name', 'courses')->first();
        $data['tesimonials_content'] = SiteContent::select('content')->where('name', 'tesimonials')->first();
        $data['footer_content'] = SiteContent::select('content')->where('name', 'footer')->first();

        $data['courses'] = Course::select('id', 'name', 'small_desc', 'cat_id', 'trainer_id', 'img', 'price')
        ->orderBy('id', 'DESC')
        ->take(3)
        ->get();

        // dd($data['courses']);

        $data['courses_count'] = Course::count();
        $data['trainers_count'] = Trainer::count();
        $data['students_count'] = Student::count();

        $data['tests'] = Test::select('name', 'spec', 'desc', 'img')->get();

        // dd($data['tests']);
        return view('front.index')->with($data);
    }
}
