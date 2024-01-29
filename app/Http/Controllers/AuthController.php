<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);

        $user = User::query()
            ->where('id', $request->username)
            ->first();

        $remember = true;

        // if $user is null, then $user->access_room_911 will assinf falseto $access

        if ($user == null) {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }

        if ($user->access_room_911 == false) {
            // save a record to the db with the user_id and status rejected
            $record = new \App\Models\Record();
            $record->user_id = $user->id;
            $record->status = 'rejected';
            $record->save();

            return back()->withErrors([
                'username' => 'You do not have access.',
            ]);
        }



        if (Auth::loginUsingId($user->id, $remember)) {

            // save a record to the db with the user_id and status approve
            $record = new \App\Models\Record();
            $record->user_id = $user->id;
            $record->status = 'approved';
            $record->save();

            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }


        // $credentials = $user->only('username', 'password');
        // $credentials['password'] = 'password';
        // if (Auth::attempt($credentials, $remember)) {
        //     return redirect()->intended('/');
        // } else {
        //     return back()->withErrors([
        //         'username' => 'The provided credentials do not match our records.',
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('auth.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('users.index');
    }

    /* invoke method */
    public function __invoke()
    {
        //
    }
}
