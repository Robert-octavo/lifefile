<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use App\Models\Department;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::with('department')->paginate();
        $users = User::query();

        //dd(request()->all());
        $last_login_at = request('last_login_at');
        $created_at = request('created_at');
        //dd($last_login_at);
        // $users->when(request('last_login_at'), function ($query = null) use ($last_login_at) {
        //     $query->where('last_login_at', '<=', $last_login_at);
        // });

        //dd($users->toSql(), $users->getBindings());

        $users->when(request('search'), function ($query, $search) {
            $query->where('id', $search)
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $search . '%');
        })->when(request('department_id'), function ($query, $department_id) {
            $query->where('department_id', $department_id);
        })->when(request('created_at'), function ($query = null) use ($created_at) {
            $query->where('created_at', '>=', $created_at);
        })->when(request('last_login_at'), function ($query = null) use ($last_login_at) {
            $query->where('last_login_at', '<=', $last_login_at);
        });
        // })->when(request('created_at'), function ($query) {
        //     $initialDate = request('created_at') . ' 00:00:00';
        //     $query->whereBetween('last_login_at', [$initialDate, now()]);
        // });


        $users = $users->with('department')->paginate();

        //save all the values from the records table
        $records = DB::table('records')->get();
        //dd($users, $records);

        return view('users.index', ['users' => $users, 'records' => $records]);
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
        return redirect()->route('users.index')->with('success', 'Employee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // find the user by id in the table records
        $records = DB::table('records')->where('user_id', $user->id)->get();
        //dd($user->toArray(), $records->toArray());

        // pass the user and the records to the view 

        return view('users.show', ['user' => $user, 'records' => $records]);


        //return view('users.show')->with('user', $user);
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
        return redirect()->route('users.index')->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Employee deleted successfully!');
    }

    public function toggleAccess(User $user)
    {
        $user->toggleAccess();
        return redirect()->back()->with('success', 'Employee updated successfully!');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());
        //dd($fileContents);

        $deparments = Department::all();
        //dd($deparments->toArray());

        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
            // create an array of data separated by commas
            $data = explode(';', $line);

            //delete the \r\n
            $data[6] = str_replace("\r\n", '', $data[6]);

            // check if the department exists in the database
            $department = Department::where('id', $data[6])->first();
            $email = User::where('email', $data[4])->first();

            if (!$department) {
                return redirect()->back()->with('error', 'Department does not exist in the database.');
            }

            if ($email) {
                return redirect()->back()->with('error', 'Email already exists in the database.');
            }

            //dd($data);
            User::create([
                'name' => $data[0],
                'last_name' => $data[1],
                'username' => $data[2],
                'access_room_911' => $data[3],
                'email' => $data[4],
                'password' => $data[5],
                'department_id' => $data[6],
                // Add more fields as needed
            ]);
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
}
