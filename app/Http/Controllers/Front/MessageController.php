<?php

namespace App\Http\Controllers\Front;

use App\Models\Message;
use App\Models\Student;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class MessageController extends Controller
{
    public function newsletter(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:100'
        ]);
        // dd($data);

        Newsletter::create($data);
        return back();
    }

    public function contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'nullable|string|max:100',
            'message' => 'required|string'
        ]);
        // dd($data);

        Message::create($data);
        return back();
    }

    public function enroll(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'spec' => 'nullable|string|max:100',
            'course_id' => 'required|exists:courses,id',
        ]);
        // dd($data);

        //abl ma asglo fe table el student hashof el email dah mwgod abl kda wla la
        $old_student = Student::select('id')->where('email', $data['email'])->first();
        if ($old_student == null)
        {
            $student = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'spec' => $data['spec'],
            ]);
            $student_id = $student->id;
        }
        else
        {
            $student_id = $old_student->id;

            if ($data['name'] !== null)
            {
                $old_student->update(['name' => $data['name']]);
            }
            if ($data['spec'] !== null)
            {
                $old_student->update(['spec' => $data['spec']]);
            }
        }

        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back();
    }
}
