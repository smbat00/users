<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UsersService;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index(UsersService $usersService){
        $users= $usersService->showList();
        return view('users',['users'=>$users]);
    }
    public function single($id,UsersService $usersService){
        $user = $usersService->singleItem($id);
        return view('update',['user'=>$user]);
    }
    public function update(Request $request,UsersService $usersService){
        $usersService->updateUser($request);
        return redirect()->route('users.list');
    }
    public function delete($id,UsersService $usersService){
        $usersService->deleteItem($id);
        return redirect()->back();
    }
    public function insert(UserRequest $request,UsersService $usersService){
        $usersService->createItem($request);
        return redirect()->back();
    }
}
