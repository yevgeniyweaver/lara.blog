<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repository\UserRepo as repo;
use Illuminate\Support\Facades\Storage;
use Doctrine\ORM\EntityManager;

use Closure;


//use App\Validation\PostValidator;

class UserController extends Controller
{
    //
    private $repo;

    public function __construct(repo $repo)
    {
        $this->repo = $repo;
        //$this->middleware('isuser')->only('index');
    }


    // if id is empty redirect to showAll action with list of all objects
    public function show(){
        if (Auth::check()) {
            //return redirect('/admin');///home
           var_dump(Auth::user()->getEmail());
        }

//        if(!empty($id)){
//            $object = $this->repo->show($id);
//            return view('admin.show', compact('user') );
//        }else{
//            return redirect()->action($this->showAll());
//        }
    }

}
