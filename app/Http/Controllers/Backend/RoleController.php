<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
       return view('backend.role.index', compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function data(Request $request)
    {
        $orderBy = 'users.id';
        switch ($request->input('order.0.dir')) {

            case "1":
                $orderBy = 'users.name';
                break;

        }
        // dd($request->input('order.0.dir'));
        $data = User::select([
            'users.*',
        ]);

        if ($request->input('search.value') != null) {
            $data = $data->where(function ($q) use ($request) {
                $q->whereRaw('LOWER(users.id) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(users.name) like ? ', ['%' . strtolower($request->input('search.value')) . '%']);
            });
        }

        $recordsFiltered = $data->get()->count();
        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        $recordsTotal = $data->count();
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
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
            'name' => 'required|unique:roles'
        ]);

        $role = new Role();

        $role->name = Str::lower($request->name);

        $role->save();
        $role->permissions()
            ->sync($request->permission);

        return redirect()
            ->route('roles.index')
            ->with('success', 'The role added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $role = Role::find($id);
        $users = $role->users()
            ->paginate();

        return view('backend.role.show', compact('users','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function add(Request $request,$id)
    {
        $role = Role::find($id);



        $users = User::all();
        if ($request->isMethod('post')) {

            $request->validate([
'name' => 'required|exists:users,name'
            ]);
            $users = User::where('name', $request->name)->first();

            $check = $role->users()
                ->syncWithoutDetaching($users->id);

            if (empty($check['attached'])) {
                return back()
                    ->withErrors('The user already added');
            }

            return back()
                ->with('success', 'The user added successfully!');
        }


        return view('backend.role.add', compact('role', 'users'));
    }
}
