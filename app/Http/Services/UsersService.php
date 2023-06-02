<?php
namespace App\Http\Services;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Collection;

class UsersService
{
    public function showList(): ?Collection
    {
        return User::get();
    }
    public function singleItem($id): ?User
    {
        return  User::find($id);
    }

    public function updateUser($request): ?bool
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();
        return true;
    }
    public function deleteItem($id)
    {
        return  User::find($id)->delete();
    }
    public function createItem(Request $request): ?bool
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return  true;
    }
}
