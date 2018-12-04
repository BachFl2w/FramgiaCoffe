<?php

namespace App\Http\Controllers;

use Session;

use App\User;
use App\Order;
use App\Role;
Use Alert;
use App\Repositories\Repository;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    protected $userModel;
    protected $roleModel;

    public function __construct(User $userModel, Role $roleModel)
    {
        // set the model
        $this->userModel = new Repository($userModel);
        $this->roleModel = new Repository($roleModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id != 1) {
            return back()->with('fail', __('message.fail.permission'));
        }

        $roles = $this->roleModel->all();
        $user = $this->userModel->all()->load('role');

        return view('admin.user_list', compact('user', 'roles'));
    }

    public function json()
    {
        if (Auth::user()->role_id != 1) {
            return back()->with('fail', __('message.fail.permission'));
        }

        $roles = $this->roleModel->all();
        $user = $this->userModel->all()->load('role');

        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id != 1) {
            return back()->with('fail', __('message.fail.permission'));
        }

        $roles = $this->roleModel->all();

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
        if (Auth::user()->role_id != 1) {
            return back()->with('fail', __('message.fail.permission'));
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $newName = str_random(4) . '_' . $name;

            while (file_exists(config('asset.image_path.avatar') . $newName)) {
                $newName = str_random(4) . '_' . $name;
            }

            $file->move(config('asset.image_path.avatar'), $newName);

            $image = $newName;
        } else {
            $image = null;
        }

        $data = $this->userModel->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'role_id' => $request->role,
            'active' => 1,
            'image' => $image,
        ]);

        $user = $data->load('role');

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $currentUser = Auth::user();

        if ($currentUser->role_id == 1) {

            if ($user->role_id == 1 && $currentUser->email != $user->email) {
                return back()->with('fail', __('message.fail.permission'));
            }

            return view('admin.user_edit', compact('user'));
        } else {

            if ($currentUser->email != $user->email) {
                return back()->with('fail', __('message.fail.permission'));
            }

            if ($currentUser->role_id == 3) {
                $order = Order::where('user_id', $currentUser->id)->orderBy('order_time', 'desc')->paginate(5);
                return view('profile', compact('user', 'order'));
            }

            return view('admin.user_edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $currentUser = Auth::user();

        if ($currentUser->role_id == 1) {
            if ($user->role_id == 1 && $currentUser->email != $user->email) {
                return back()->with('fail', __('message.fail.permission'));
            }
        } else {
            if ($currentUser->email != $user->email) {
                return back()->with('fail', __('message.fail.permission'));
            }
        }

        $password = $user->password;

        if ($request->password != '') {
            $password = Hash::make($request->password);
        }

        $newName = $user->image;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $newName = str_random(4) . '_' . $name;

            // kiem tra de tranh trung lap ten file
            while (file_exists(config('asset.image_path.avatar') . $newName)) {
                $newName = str_random(4) . '_' . $name;
            }

            if (file_exists(config('asset.image_path.avatar') . $user->image) && $user->image) {
                unlink(config('asset.image_path.avatar') . $user->image);
            }

            $file->move(config('asset.image_path.avatar'), $newName);
        }

        $this->userModel->update(
            [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'image' => $newName,
                'password' => $password,
                'image' => $newName,
            ],
            $user->id
        );

        return back()->with('success', __('message.success.update'));
    }

    public function active(User $user)
    {
        $currentUser = Auth::user();

        if ($currentUser->role_id == 1) {
            if ($user->role_id == 1 && $user->active == 1) {
                return 'false';
            } else {
                $this->userModel->update(['active' => $user->active == 1 ? 0 : 1], $user->id);

                return 'true';
            }
        }

        return 'false';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $currentUser = Auth::user();

        if ($currentUser->role_id == 1 && $user->role_id != 1) {
            $user->delete();

            return 'true';
        }

        return 'false';
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role_id == 3) {
                return redirect(route('client.index'));
            }

            return redirect()->route('admin.index');
        }

        return back()->with('fail', __('message.fail.login'));
    }

    public function logoutAdmin()
    {

        Auth::logout();

        return redirect(route('login'));
    }

    public function logoutUser()
    {
        Auth::logout();

        return redirect(route('client.index'));
    }
}
