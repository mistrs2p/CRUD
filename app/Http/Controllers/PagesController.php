<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Laravel';
        return view('pages.index')->with('title', $title);

        // return view('pages.index', compact('title'));
    }

    public function about(){
        $title = 'درباره من واقعا';
        return view('pages.about')->with('title', $title);
    }

    public function services(){

        $data = array(
            'title' => 'خدماتم تم',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
