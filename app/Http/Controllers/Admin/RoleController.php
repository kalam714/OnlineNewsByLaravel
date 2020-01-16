<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use DB;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name='Role Page';
        $data=Role::all();
        return view('admin.role.list',compact('page_name','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name='Role Page';
        $permission=Permission::pluck('name','id');
        return view('admin.role.create',compact('permission','page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'name'=>'required',
            'permission'=>'required|array',
            'permission.*'=>'required|string'

            ],[
                'name.required'=>'Name Field Is Required',
                'permission.required'=>'you must select a  permission',
                'permission.*.required'=>'you must select a  permission'
            ]);
        $role=New Role();
        $role->name=$request->name;
        $role->display_name=$request->display_name;
         $role->description=$request->description;
         $role->save();
         foreach ($request->permission as $value) {
            $role->attachPermission($value);
         }
         return redirect()->action('Admin\RoleController@index')->with('success',"Permission Set SuccessFully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name='Role Edit';
        $role=Role::find($id);
        $permission=Permission::pluck('name','id');

        $selectPermission=DB::table('permission_role')->where('permission_role.role_id',$id)->pluck('permission_id')->toArray();
        return view('admin.role.edit',compact('page_name','permission','selectPermission','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name'=>'required',
            'permission'=>'required|array',
            'permission.*'=>'required'

            ],[
                'name.required'=>'Name Field Is Required',
                'permission.required'=>'you must select a  permission',
                'permission.*.required'=>'you must select a  permission'
            ]);
        $role=Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
         $role->description=$request->description;
         $role->save();
         DB::table('permission_role')->where('role_id',$id)->delete();
         foreach ($request->permission as $value) {
            $role->attachPermission($value);
         }
         return redirect()->action('Admin\RoleController@index')->with('success',"Permission Set SuccessFully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();
         return redirect()->action('Admin\RoleController@index')->with('success',"Role DELETE SuccessFully");
    }
}
