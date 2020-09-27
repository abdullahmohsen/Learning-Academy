<?php

namespace App\Http\Controllers\Front;

use App\Models\Setting;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $data['settings'] = Setting::first();
        $data['footer_content'] = SiteContent::select('content')->where('name', 'footer')->first();

        return view('front.contact.index')->with($data);
    }
}
