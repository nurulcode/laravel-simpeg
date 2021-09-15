<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::with('permissions')->get();
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        // ->where("role_has_permissions.role_id",$id)
        // ->get();

        if($request->ajax()){
            return datatables()->of($roles)
                        ->addColumn('action', function($data){
                            $action  = '<a class="btn btn-info btn-sm waves-effect waves-light" href="'.route("roles.show", $data->id).'" ><i class="fas fa-eye"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<a class="btn btn-primary btn-sm waves-effect waves-light" href="'.route("roles.edit", $data->id).'"><i class="fas fa-edit"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                            return $action;
                        })
                        ->addColumn('roles', function($data){
                            $roles = '';

                            foreach ($data->permissions as $v) {
                                $roles .= '<label class="badge badge-primary mr-1 p-1">'.$v->name.'</label>';
                                if ( Str::of($v->name)->contains('delete') || $v->name == 'superuser' ) {
                                    $roles .='<br>';

                                }
                            }
                            return $roles;
                        })
                        ->editColumn('created_at', function($data){
                            $create = Carbon::parse($data->created_at);
                            return $create;
                        })
                        ->rawColumns(['action', 'roles'])
                        ->addIndexColumn()
                        ->make(true);
        }


        return view('roles.index',compact('roles'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function show($id)
    // {
    //     $role = Role::find($id);
    //     return $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
    //         // ->where("role_has_permissions.role_id",$id)
    //         ->get();

    //     return view('roles.show',compact('role','rolePermissions'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::select('id', 'name')->get();
        return $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        // return $role;
        return view('roles.edit',compact('role','permission','rolePermissions'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success','Role updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}
