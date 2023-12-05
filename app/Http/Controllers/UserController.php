<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('department')->paginate();
        //dd($users->toArray());
        return view('users.index')->with('users', $users);
        // pass the users to the view and load the view with the relationship department
        //return view('users.index', ['users' => $users->load('department')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('create');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'department_id' => 'required',
            'password' => 'required',
        ]);

        $access_room = $request->filled('access_room_911');


        //name + last-name for username
        $username = $data['name'] . '.' . $data['last_name'];
        // data and username

        $user = new User();
        $user->name = $data['name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->username = $username;
        $user->password = $data['password'];
        $user->access_room_911 = $access_room;
        $user->department_id = $data['department_id'];
        $user->email_verified_at = now();
        $user->last_login_at = now();
        $user->remember_token = Str()->random(10);
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        //dd($data, $access_room, $username);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //dd($user->toArray());
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, User $user)
    {
        $access_room = $request->filled('access_room_911');
        $user->access_room_911 = $access_room;
        //dd($request->toArray(), $user->toArray());
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
