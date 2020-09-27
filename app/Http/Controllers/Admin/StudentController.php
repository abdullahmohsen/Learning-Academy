<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = Student::select('id', 'email', 'spec', 'name')
        ->orderBy('id', 'DESC')->get();
        return view('admin.students.index')->with($data);
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:students',
            'spec' => 'nullable|string|max:50',
        ]);
        Student::create($data);
        return redirect(route('admin.student.index'));
    }

    public function edit($id)
    {
        $data['student'] = Student::findOrFail($id);
        return view('admin.students.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:students',
            'spec' => 'nullable|string|max:50',
        ]);
        Student::findOrFail($request->id)->update($data);
        return redirect(route('admin.student.index'));
    }

    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        return back();
    }

    public function showCourses($id)
    {
        $data['courses'] = Student::findOrFail($id)->courses;
        $data['student_id'] = $id;
        return view('admin.students.showCourses')->with($data);
    }

    public function approveCourse($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
            'status' => 'approve'
        ]);
        return back();
    }

    public function rejectCourse($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
            'status' => 'reject'
        ]);
        return back();
    }

    public function addCourse($id)
    {
        $data['student_id'] = $id;

        $data['courses'] = Course::select('id', 'name')->get();
        return view('admin.students.addCourse')->with($data);
    }

    public function storeCourse($id, Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);

        DB::table('course_student')->insert([
            'student_id' => $id,
            'course_id' => $data['course_id'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect(route('admin.student.showCourses', $id));
    }

    public function deleteCourse($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->delete();
        // DB::findOrFail($id)->delete();
        return back();
    }
}
