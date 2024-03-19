<?php

namespace App\Http\Controllers;

use App\Jobs\UserRegistrationJob;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
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
        return view('auth.login');
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

    function register()
    {
        return view('auth.register');
    }

    function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email'
        ]);

        try {
            $password = Str::random(8);
            $data = $request->only(['name', 'phone', 'email']);
            $data['password'] = bcrypt($password);
            $data['role'] = User::USER;
            $data['status'] = User::INACTIVE;

            $this->userRepo->store($data);

            dispatch(new UserRegistrationJob($request->email, $password));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->route('login')->with('success', "Silahkan login dengan email ({$data['email']}) dan password yang dikirimkan ke email tersebut");
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
