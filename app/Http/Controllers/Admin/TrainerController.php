<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    public function index()
    {
        $data['trainers'] = Trainer::select('id', 'name', 'phone', 'spec', 'img')
        ->orderBy('id', 'DESC')->get();
        return view('admin.trainers.index')->with($data);
    }

    public function create()
    {
        return view('admin.trainers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'spec' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'img' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $new_name_img = $data['img']->hashName(); //bet3ml hashing l name image
        Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/'. $new_name_img));
        // dd($new_name);
        $data['img'] = $new_name_img;
        
        Trainer::create($data);
        return redirect(route('admin.trainer.index'));
    }

    public function edit($id)
    {
        $data['trainer'] = Trainer::findOrFail($id);
        return view('admin.trainers.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'spec' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        //esm el sora el adem
        $old_name_img = Trainer::findOrFail($request->id)->img;

        //Lw el request feh file img
        if($request->hasFile('img'))
        {
            //hams7 el sora el adema mn el folder w a7ot maknha el sora el gdeda w a3ml save ll esm el gded fel database
            Storage::disk('uploads')->delete('trainers/'. $old_name_img);

            $new_name_img = $data['img']->hashName(); //bet3ml hashing l name image
            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/'. $new_name_img));
            $data['img'] = $new_name_img;
        }
        else
        {
            //ha7tafez bel esm el adem fel database
            $data['img'] = $old_name_img;
        }
        Trainer::findOrFail($request->id)->update($data);
        return redirect(route('admin.trainer.index'));
    }

    public function delete($id)
    {
        $old_name_img = Trainer::findOrFail($id)->img;
        Storage::disk('uploads')->delete('trainers/'. $old_name_img);

        Trainer::findOrFail($id)->delete();
        return back();
    }
}
