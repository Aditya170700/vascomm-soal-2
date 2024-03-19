<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    function index()
    {
        $data['active_user'] = $this->userRepo->countUser(true);
        $data['inactive_user'] = $this->userRepo->countUser(false);

        return view('dashboard.index', $data);
    }
}
