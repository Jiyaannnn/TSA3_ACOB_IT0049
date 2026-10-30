<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    // Controllers select the Blade view and supply its page metadata.
    public function home(): View
    {
        return view('pages.home', ['title' => 'Overview', 'activePage' => 'home']);
    }

    public function about(): View
    {
        return view('pages.about', [
            'title' => 'About',
            'activePage' => 'about',
            // Keep personal information in one place before passing it to the profile view.
            'student' => [
                'name' => 'Jian Edward A. Acob',
                'section' => 'BSITBA - TW32',
                'course' => 'IT0049 - Web System Technologies',
            ],
        ]);
    }
}
