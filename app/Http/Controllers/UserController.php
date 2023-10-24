<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:admin:create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin:update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin:delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all([
            'id',
            'first_names',
            'last_names',
            'role',
            'in_charge',
            'position',
            'created_at'
        ]);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'name')->all();

        return view('user.create', compact('roles'));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstnames' => 'required|string|max:255',
            'lastnames' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|string|confirmed|min:5',
            'position' => 'required|string|max:255',
            'in_charge' => 'required|string|max:255',
        ]);

        $user = new User([
            'first_names' => $request->firstnames,
            'last_names' => $request->lastnames,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'position' => $request->position,
            'in_charge' => $request->in_charge
        ]);

        $user->assignRole($request->role);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User successfully created!');;
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
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('user.update', compact('user', 'roles', 'userRole'));
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
            'firstnames' => 'required|string',
            'lastnames' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $id,
            'password' => 'same:confirm-password',
            'role' => 'required',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('role'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User has been deleted');
    }
}
