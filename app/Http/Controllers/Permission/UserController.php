<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = User::with('pegawai:id,nama_lengkap')->get();
        if($request->ajax()){
            return datatables()->of($result)
                        ->addColumn('action', function($data){
                            $action  = '<a class="btn btn-info btn-sm waves-effect waves-light" href="'.route("users.show", $data->id).'" ><i class="fas fa-eye"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<a class="btn btn-primary btn-sm waves-effect waves-light" href="'.route("users.edit", $data->id).'"><i class="fas fa-edit"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                            return $action;
                        })
                        ->editColumn('pegawai', function($data) {
                            $pegawai = $data->pegawai ? $data->pegawai->nama_lengkap : '<span class="text-danger">Super Admin</span>';
                            return $pegawai ;
                        })
                        ->addColumn('roles', function($data){
                            $roles = $data->getRoleNames();
                            $role = '';
                            foreach ($roles as $v) {
                                $role .= '<label class="badge badge-primary">'.$v.'</label> ';
                            }
                            return $role;
                        })
                        ->rawColumns(['action', 'pegawai', 'roles'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles', 'pegawais'));
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
            'username' => 'required|unique:users,username',
            'pegawai_id' => 'required',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required',
        ]);

        $input = $request->all();
        $input['role'] = 'user';
        $input['pegawai_id'] = (int) $request->pegawai_id;
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        $roles = Role::pluck('name')->all();
        $userRole = $user->roles->pluck('name')->all();

        return view('users.edit',compact('user','roles','userRole', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username,'.$user->id,
            'pegawai_id' => 'required|unique:users,pegawai_id,'.$user->id,
        ]);

        $input = $request->all();

        if ( !empty($input['password']) ) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
