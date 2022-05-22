<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\User;
use Modules\Admin\Http\Requests\RegisterRequest;
use Modules\Admin\Http\Requests\UserUpdateRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = User::latest()->paginate(20);

        return view('admin::user.list',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(User $user)
    {
        return view('admin::user.edit',compact('user'));
    }

    public function create()
    {
        return view('admin::user.create');
    }

    public function store(RegisterRequest $request){
        $userData = $request->validated();
        $userData['isAdmin'] = $request->has('isAdmin');

        User::create($userData);
        return redirect('/admin/users')->with('success', "Account successfully registered.");
    }

    public function show(User $user){
        return view('admin::user.show', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $userData = $request->validated();
        $userData['isAdmin'] = $request->has('isAdmin');

        $user->update(array_filter($userData));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
