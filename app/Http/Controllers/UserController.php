<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();

        return view('', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $req, [
                'name' => 'required|max:191',
                'email' => 'required|email|unique:users,email|max:191',
                'password' => 'required|max:191',
                're_password' => 'required|same:password',
                'address' => 'required|max:191',
                'phone' => 'required|max:11|numeric',
                'role_id' => 'required',
            ], [
                'name.required' => 'Enter user name !',
                'name.max' => 'Name must smaller 191 character !',
                'email.max' => 'Email must smaller 191 character !',
                'email.required' => 'Enter user name !',
                'email.email' => 'Not is email !',
                'email.unique' => 'Email name has exists !',
                'password.required' => 'Enter user password !',
                'password.max' => 'Password must smaller 191 character !',
                're_password.required' => 'Enter re_password !',
                're_password.same' => 'Password not same !',
                'address.required' => 'Enter user address !',
                'address.max' => 'Address must smaller 191 character !',
                'phone.required' => 'Enter user phone number !',
                'phone.max' => 'Phone must smaller 11 number !',
                'phone.numeric' => 'Phone must be numeric !',
                'role_id.required' => 'Select role !',
            ]
        );

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;
        $user->save();

        return view('')->with('success', 'Create user successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('', compact('user'));
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
        $roles = Roles::all();

        return view('', compact('user', 'roles'));
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
        $this->validate(
            $req, [
                'name' => 'required|max:191',
                'email' => 'required|email|unique:users,email|max:191',
                'password' => 'required|max:191',
                're_password' => 'required|same:password',
                'address' => 'required|max:191',
                'phone' => 'required|max:11|numeric',
                'role_id' => 'required',
            ], [
                'name.required' => 'Enter user name !',
                'name.max' => 'Name must smaller 191 character !',
                'email.max' => 'Email must smaller 191 character !',
                'email.required' => 'Enter user name !',
                'email.email' => 'Not is email !',
                'email.unique' => 'Email name has exists !',
                'password.required' => 'Enter user password !',
                'password.max' => 'Password must smaller 191 character !',
                're_password.required' => 'Enter re_password !',
                're_password.same' => 'Password not same !',
                'address.required' => 'Enter user address !',
                'address.max' => 'Address must smaller 191 character !',
                'phone.required' => 'Enter user phone number !',
                'phone.max' => 'Phone must smaller 11 number !',
                'phone.numeric' => 'Phone must be numeric !',
                'role_id.required' => 'Select role !',
            ]
        );

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;
        $user->save();

        return view('')->with('success', 'Update user successfully !');
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

        return view('')->with('success', 'Delete user successfully !');
    }
}
