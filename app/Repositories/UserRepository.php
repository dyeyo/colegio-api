<?php

namespace App\Repositories;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::with('schools')->get();
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rut' => $data['rut'],
            'phone' => $data['phone'] ?? null,
        ]);

        $user->schools()->sync($data['school_ids']);

        return $user->load('schools');
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'rut' => $data['rut'],
            'phone' => $data['phone'] ?? null,
        ]);

        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
            $user->save();
        }

        if (isset($data['school_ids'])) {
            $user->schools()->sync($data['school_ids']);
        }

        return $user->load('schools');
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function find($id)
    {
        return User::with('schools')->findOrFail($id);
    }
}
