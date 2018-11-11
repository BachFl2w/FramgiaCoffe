<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->load('role');

        return view('admin.user_list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.user_create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->address  = $request->address;
        $user->phone    = $request->phone;
        $user->role_id  = $request->role;

        if ($request->role_id == 1 || $request->role_id == 2) {
            $user->active   = 0;
        } else {
            $user->active   = 1;
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $newName = str_random(4) . '_' . $name;

            while (file_exists('images/avatar/' . $newName)) {
                $newName = str_random(4) . '_' . $name;
            }

            $file->move('images/avatar/', $newName);

            $user->image = $newName;
        }

        $user->save();

        return back()->with('success', 'Create user successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('role_id', $id)->get();

        return view('admin.user_show', compact('user'));
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
        $currentUser = User::find(Auth::id());

        if ($currentUser->role_id == 1) {
            if ($user->role_id == 1 && $currentUser->email != $user->email) {
                return back()->with('fail', 'You can not edit this account !');
            }

            return view('admin.user_edit', compact('user'));
        } else {
            if ($currentUser->email != $user->email) {
                return back()->with('fail', 'You can not edit this account !');
            }

            return view('admin.user_edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $currentUser = User::find(Auth::id());

        if ($currentUser->role_id == 1) {
            if ($user->role_id == 1 && $currentUser->email != $user->email) {
                return back()->with('fail', 'You can not edit this account !');
            }
        } else {
            if ($currentUser->email != $user->email) {
                return back()->with('fail', 'You can not edit this account !');
            }
        }

        $user->name    = $request->name;
        $user->address = $request->address;
        $user->phone   = $request->phone;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $newName = str_random(4) . '_' . $name;

            // kiem tra de tranh trung lap ten file
            while (file_exists('images/avatar' . $newName)) {
                $newName = str_random(4) . '_' . $name;
            }

            if (file_exists('images/avatar/' . $user->image) && $user->image) {
                unlink('images/avatar/' . $user->image);
            }

            $file->move('images/avatar/', $newName);

            $user->image = $newName;
        }

        $user->save();

        return back()->with('success', 'Update user successfully !');
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
        $currentUser = User::find(Auth::id());

        if ($currentUser->role_id == 1 && $user->role_id != 1) {
            $user = User::find($id);
            $user->delete();

            return back()->with('success', 'Delete user successfully !');
        }

        return back()->with('fail', 'Dont have permission !');
    }

    public function loginAdmin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect('admin/user/index');
        }

        return back()->with('fail', 'Email or password is not true !');
    }

    public function logoutAdmin()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
