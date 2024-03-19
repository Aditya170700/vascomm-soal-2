<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    private $userRepo;
    private $productRepo;

    public function __construct(UserRepository $userRepo, ProductRepository $productRepo)
    {
        $this->userRepo = $userRepo;
        $this->productRepo = $productRepo;
    }

    function index()
    {
        $data['active_user'] = $this->userRepo->countUser(true);
        $data['inactive_user'] = $this->userRepo->countUser(false);
        $data['active_product'] = $this->productRepo->countProduct(true);
        $data['inactive_product'] = $this->productRepo->countProduct(false);
        $data['products'] = $this->productRepo->getLimited(10);

        return view('dashboard.index', $data);
    }
}
