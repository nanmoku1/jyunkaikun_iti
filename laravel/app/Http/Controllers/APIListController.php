<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        return view('api_list.index');
    }
}
