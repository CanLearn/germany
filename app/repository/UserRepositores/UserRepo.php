<?php

namespace App\Repository\UserRepositores;

use App\Models\User;

class UserRepo
{
    public function paginate()
    {
        return User::paginate();
    }

    public function store( $valus)
    {
        return User::create([
            'name' => $valus->name,
            'email' => $valus->email,
            'password' => bcrypt($valus->password),
            'phone' => $valus->phone,
            'position_site' => $valus->position_site,
            'address' => $valus->address,
            'code_post' => $valus->code_post,
            'website' => $valus->website,
            'linkedin' => $valus->linkedin,
            'facebook' => $valus->facebook,
            'twitter' => $valus->twitter,
            'youtube' => $valus->youtube,
            'instagram' => $valus->instagram,
            'telegram' => $valus->telegram,
            'cart_number' => $valus->cart_number,
            'shaba_cart' => $valus->shaba_cart,
            'bio' => $valus->bio,
            'status' => User::STATUS_ACTIVE,
        ]);
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function update($userId ,$valus )
    {
        $update = [
            'name' => $valus->name,
            'email' => $valus->email,
            'phone' => $valus->phone,
            'position_site' => $valus->position_site,
            'address' => $valus->address,
            'code_post' => $valus->code_post,
            'website' => $valus->website,
            'linkedin' => $valus->linkedin,
            'facebook' => $valus->facebook,
            'twitter' => $valus->twitter,
            'youtube' => $valus->youtube,
            'instagram' => $valus->instagram,
            'telegram' => $valus->telegram,
            'cart_number' => $valus->cart_number,
            'shaba_cart' => $valus->shaba_cart,
            'bio' => $valus->bio,
            'status' => User::STATUS_ACTIVE,
        ] ;
        if(!is_null($valus->password))
        {
           $update['password'] = bcrypt($valus->password) ;
        }

            $user = User::find($userId) ;
        $user->syncRoles([]);
        if ($valus['role'])
            $user->assignRole($valus['role']);

        return User::query()->where('id' , $userId)->update($update);
    }

    public function search($request)
    {
        return User::query()->where('name', 'LIKE', "%{$request->search}%");
    }

    public function manager()
    {
        return User::role('manager')->get();
    }
    public function super_manager()
    {
        return User::role('super_manager')->get();
    }
    public function admin()
    {
        return User::role('admin')->get();
    }

    public function teacher()
    {
        return User::role('teacher')->get();
    }

    public function article()
    {
        return User::role('article')->get();
    }

    public function student()
    {
        return User::role('student')->get();
    }
}
