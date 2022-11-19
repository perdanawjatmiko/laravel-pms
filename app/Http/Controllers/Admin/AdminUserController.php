<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequests;
use Carbon\Carbon;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::with('role')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'role' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        if($request->avatar) {

            $data['avatar'] = $request->file('avatar')->store('uploads/avatars');
        }
        
        User::create($data);

        return redirect('users')->withSuccess('User Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'role' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequests $request, User $user)
    {
        $validData = $request->validated();
        if ($request->password == null) {
            $validData['password'] = $user->password;
        } else {
            $validData['password'] = bcrypt($request->password);
        }
        if ($request->avatar){
            $validData['avatar'] = $request->file('avatar')->store('uploads/avatars');
        } else {
            $validData['avatar'] = $user->avatar;
        }

        User::where('id',$user->id)->update($validData);

        return redirect('/users')->with('info', 'User '. $user->fname.' '. $user->lname .' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy('id',$user->id);
        if($user->avatar)
        {
            Storage::delete($user->avatar);
        }
        return redirect('users')->with('warning','User '.$user->fname.' deleted!');
    }
}
