<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    function index(Request $request)
    {
        $data['results'] = $this->userRepo->getPaginated($request);

        return view('dashboard.user.index', $data);
    }

    function approve($id)
    {
        $this->userRepo->update($id, [
            'status' => 1
        ]);

        return redirect()->back()->with('success', 'User berhasil diapprove');
    }
}
