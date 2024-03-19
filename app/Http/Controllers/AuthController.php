<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    function login()
    {
        return view('login');
    }

    function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $this->userRepo->findByEmail(($request->email));

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::attempt($request->only(['email', 'password']));

            if ($user->role == User::ADMIN) {
                return redirect()->route('dashboards');
            }

            return redirect()->route('welcome');
        }

        return redirect()->back()->with('error', 'Credential doesn\'t match');
    }

    function logout()
    {
        $route = 'login';

        if (auth()->user()->role == User::USER) {
            $route = 'welcome';
        }

        auth()->logout();

        return redirect()->route($route);
    }
}
