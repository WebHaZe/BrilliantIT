<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use App\Models\Phone;

class HomeController extends Controller
{
    public function showUsersInfo()
    {
      return view('home', [
        'users' => User::all()
      ]);
    }

    public function addNewUser(AddUserRequest $request)
    {
      $newUser = new User;
      $newUser->setFirstName($request->input('firstName'));
      $newUser->setLastName($request->input('lastName'));
      $newUser->save();

      $userPhone = new Phone(['phone' => $request->input('phone')]);
      $newUser->phones()->save($userPhone);

      return redirect()->route('home')->with('success', 'New user was successfully added.');
    }

    public function removeUser(int $id)
    {
      User::find($id)->delete();

      return redirect()->route('home')->with('success', 'User was successfully removed.');
    }
}
