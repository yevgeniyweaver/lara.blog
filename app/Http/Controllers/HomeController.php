<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    protected static $private;

    static public function setPrivate($private)
    {
        self::$private = $private;
    }
    static public function getPrivate()
    {
        return self::$private;
    }
    static $repost;
    static public function getStatic($description)
    {
        self::$repost = $description;
        return self::$repost;
    }
}
