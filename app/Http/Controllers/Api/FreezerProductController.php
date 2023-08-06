<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FreezerProductRequest;
use App\Services\Interfaces\FreezerProductInterface;


class FreezerProductController extends Controller
{
    private FreezerProductInterface $freezerProductRepository;


    public function __construct(FreezerProductInterface $freezerProductRepository)
    {
        $this->freezerProductRepository = $freezerProductRepository;
    }

    public function index($freezer_id)
    {
        $result = $this->freezerProductRepository->list($freezer_id);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Buzdolabınızdaki ürünleri getirme işlemi başarısız oldu'], 500);
        }
    }

    public function store(FreezerProductRequest $request)
    {
        $validated = $request->validated();
        $result = $this->freezerProductRepository->create($validated);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Buzdolabı ekleme işlemi başarısız oldu'], 500);
        }
    }

    // Belirli bir freezer ürününü getir
    public function show($id)
    {
        $result = $this->freezerProductRepository->findById($id);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Ürün getirme işlemi başarısız oldu'], 500);
        }
    }

    // Bir freezer ürününü güncelle
    public function update(FreezerProductRequest $request, $id)
    {

        $validated = $request->validated();

        $result = $this->freezerProductRepository->update($validated,$id);

        if ($result) {
            return response()->json($validated,200);
        } else {
            return response()->json(['message' => 'Ürün güncelleme işlemi başarısız oldu'], 500);
        }
    }

    // Bir freezer ürününü sil
    public function destroy($id)
    {
        $result = $this->freezerProductRepository->delete($id);

        if ($result) {
            return response()->json(['message' => 'Ürün başarıyla silindi'],200);
        } else {
            return response()->json(['message' => 'Ürün silme işlemi başarısız oldu'], 500);
        }
    }
}
