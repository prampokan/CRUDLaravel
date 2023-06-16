<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register () {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action (Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'email' => 'required|email|unique:tb_user,email',
            'password' =>  'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Registation success. Please Login! ');
    }

    public function login () {
        $data['title'] = 'login';
        return view('user/login', $data);
    }

    public function login_action (Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
        }
        return redirect()->back()->withErrors(['password' => 'wrong username or password!']);
    }

    public function landing () {
        $data = [
            'title' => 'Beranda',
        ];
        return view('landing', $data);
    }

    public function dataUser () {
        $dataUser = User::paginate(8);
        return view('user.dataUser',compact('dataUser'));
    }

    public function createUser () {
        return view('user.createUser');
    }

    public function store (Request $request) {

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'email' => 'required|email|unique:tb_user,email',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('dataUser')->with('success', 'Add new data success!');
    }

    public function show($user_id)
    {
        //
    }

    public function editUser ($user_id) {
        $user = User::findorfail($user_id);
        return view('user.editUser', compact('user'));
    }

    public function update(Request $request, $user_id){ 
        $user = User::findorfail($user_id);
        $user->update($request->all());
        return redirect()->route('dataUser')->with('success', 'Edit data success!');
    }

    public function destroy($user_id) {
        $user = User::findorfail($user_id);
        $user->delete();
        return redirect()->route('dataUser')->with('success', 'Data deleted!');
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
