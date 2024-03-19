<?php

namespace App\Http\Controllers\DAshboard;

use App\Services\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    function index(Request $request)
    {
        $data['results'] = $this->productRepo->getPaginated($request);

        return view('dashboard.product.index', $data);
    }

    function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:0,1'
        ]);

        $data = $request->only(['name', 'price', 'status']);
        $data['image'] = File::upload('products', $request->file('image'));

        $this->productRepo->store($data);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image',
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:0,1'
        ]);

        $data = $request->only(['name', 'price', 'status']);

        if ($request->file('image')) {
            $data['image'] = File::upload('products', $request->file('image'));
        }

        $this->productRepo->update($id, $data);

        return redirect()->back()->with('success', 'Produk berhasil diedit');
    }

    function destroy($id)
    {
        $this->productRepo->delete($id);

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
