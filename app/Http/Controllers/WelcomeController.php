<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class WelcomeController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    function index(Request $request)
    {
        $data['latest_products'] = $this->productRepo->getLimited(6, true);
        $data['products'] = $this->productRepo->getLimited(12, true, 6);

        return view('welcome', $data);
    }
}
