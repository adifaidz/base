<?php

namespace AdiFaidz\Base\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;

use AdiFaidz\Base\Http\Controllers\Controller;
use AdiFaidz\Base\Transformers\PermissionTransformer;
use AdiFaidz\Base\Permission;

class PermissionController extends Controller
{

    function __construct(PermissionTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('base::admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('base::admin.permission.create')->with($this->getFormReference());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('admin.permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $permissionJson = json_encode($this->transformer->transform($permission));
        return view('base::admin.permission.show',compact('permission', 'permissionJson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permissionJson = json_encode($this->transformer->transform($permission));
        return view('base::admin.permission.edit',compact('permission', 'permissionJson'))->with($this->getFormReference());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validator($request->all())->validate();

        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('admin.permission.show', ['id' => $permission->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return $permission;
    }

    public function validator(array $data)
    {
      return Validator::make($data, []);
    }
}
