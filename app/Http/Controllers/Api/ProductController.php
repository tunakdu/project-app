<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private ProductInterface $productRepository;


    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $result = $this->productRepository->list();
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Ürün getirme işlemi başarısız oldu'], 500);
        }
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $result = $this->productRepository->create($validated);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Ürün ekleme işlemi başarısız oldu'], 500);
        }
    }

    public function show($id)
    {
        $result = $this->productRepository->findById($id);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Ürün getirme işlemi başarısız oldu'], 500);
        }
    }

    public function update(ProductRequest $request, $id)
    {
        $validated = $request->validated();

        $result = $this->productRepository->update($validated,$id);

        if ($result) {
            return response()->json($validated,200);
        } else {
            return response()->json(['message' => 'Ürün güncelleme işlemi başarısız oldu'], 500);
        }
    }

    public function destroy($id)
    {
        $result = $this->productRepository->delete($id);

        if ($result) {
            return response()->json(['message' => 'Ürün başarıyla silindi'],200);
        } else {
            return response()->json(['message' => 'Ürün silme işlemi başarısız oldu'], 500);
        }
    }

    public function search(Request $request){

        $result = $this->productRepository->search($request->input('name'));
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Ürün getirme işlemi başarısız oldu'], 500);
        }
    }
}
