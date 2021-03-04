<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class InfoController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        return view("home");
    }

    /**
     * @return Application|Factory|View
     */
    public function notes()
    {
        return view("notes");
    }
}
