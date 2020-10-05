<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repository\ObjectsRepo as repo;
use Illuminate\Support\Facades\Storage;
use App\Entities\Objects;
use Doctrine\ORM\EntityManager;
use function MongoDB\BSON\toJSON;
use Doctrine\ORM\Tools\Pagination\Paginator;
//use App\Validation\PostValidator;

class ObjectsController extends Controller
{

    private $repo;

    public function __construct(repo $repo)
    {
        $this->repo = $repo;
        $this->middleware('isuser')->only('index');
    }


    public function index()
    {
        //$exists = Storage::disk('public')->exists('upload/8U4rRtlWIKWnPQ0L3gHcaaGo9JyvVE67RFNMRTH2.jpeg');
        //$repository = $this->repo->showAll();
        //$repository = $doctrine->getRepository('Task');
        $objects = $this->repo->showAll();
        return View('admin.index', compact('objects'));
    }

    public function form($id=NULL)
    {
        return View('admin.create');
    }


    protected function create(Request $request)//array $data
    {
        $data =$request->all();
        if($request->file('image')){
            $path = $request->file('image')->store('upload','public');
        }else{
            $path = 'none.png';
        }
        $data['image'] = $path;
        $this->repo->create($this->repo->prepareData($data));
        return redirect()->route('admin.start');
//        $user->setPassword(bcrypt($data['password']));
//        EntityManager::persist($user);EntityManager::flush();
    }

    public function edit($id=NULL)
    {
        return View('admin.edit')->with(['data' => $this->repo->postOfId($id)]);
    }

    public function update(Request $request)
    {
        if (!$request->isMethod('post')){
            return json_encode(['error'=>'true']);
        }
        $data = $request->all();//$validate = PostValidator::validate($all);
        if($request->file('image')){
            $path = $request->file('image')->store('upload','public');
        }else{
            $path = $data['image_old'];
        }
        unset($data['image_old']);
        $data['image'] = $path;
//        if (!$validate->passes()) {
//            return redirect()->back()->withInput()->withErrors($validate);
//        }
        $object = $this->repo->postOfId($data['id']);

        if (!is_null($object)) {
            $this->repo->update($object, $data);//Session::flash('msg', 'edit success');
        } else {
            $this->repo->create($this->repo->prepare_data($data));//Session::flash('msg', 'add success');
        }
        return redirect()->route('admin.start');
    }

    public function retrieve()
    {
        return View('admin.index')->with(['Data' => $this->repo->retrieve()]);
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $data = $this->repo->postOfId($id);
        if (!is_null($data)) {

            $this->repo->delete($data);//Session::flash('msg', 'operation Success');

            return redirect()->route('admin.start');//redirect()->back();

        } else {

            return redirect()->back()->withErrors('operationFails');
        }
    }


    // show list of all objects
    public function showAll()
    {
        $objects = $this->repo->showAll();
        return view('admin.showAll', compact('objects') );
    }


    // if id is empty redirect to showAll action with list of all objects
    public function show($id){
        if(!empty($id)){
            $object = $this->repo->show($id);

            return view('admin.show', compact('object') );

        }else{

            return redirect()->action($this->showAll());
        }
    }


    // show list of all objects
    public function find(Request $request)
    {
        if(isset($request->title) && !empty($request->title)){
            $foundObjects = $this->repo->findByTitle($request->title);
            if(!empty($foundObjects)){

                return view('admin.find', compact('foundObjects') );

            }else{

                return redirect()->route('admin.start');

            }
        }else{
            return redirect()->route('admin.start');
        }
    }
}
