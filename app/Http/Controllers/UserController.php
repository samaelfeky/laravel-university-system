<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with([
            'student',
            'teacher',
        ])->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->validated());

        return to_route('users.index');
    }

    public function show($id)
    {
        $user = User::with([
            'student.department',
            'student.courses',
            'student.phones',
            'teacher.department',
            'teacher.courses',
        ])->findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return to_route(
            'users.show',
            $user->id
        );
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return to_route('users.index');
    }
}