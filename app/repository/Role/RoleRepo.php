<?php

namespace App\Repository\Role;

use Spatie\Permission\Models\Role;

class RoleRepo
{
    public function index(){
       return Role::all();
    }

    public function create($values)
    {
        return Role::create([
            'name' => $values->name ,
        ]);
    }

    public function delete($id){
        return Role::query()->where('id' , $id)->delete();
    }

    public function search($request)
    {
        return Role::query()->where('name' , 'LIKE' ,  "%{$request->search}%") ;
    }
}
