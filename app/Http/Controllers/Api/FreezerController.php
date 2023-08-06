<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FreezerRequest;
use App\Services\Interfaces\FreezerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class FreezerController extends Controller
{


    private FreezerInterface $freezerRepository;


    public function __construct(FreezerInterface $freezerRepository)
    {
        $this->freezerRepository = $freezerRepository;
    }

    public function index()
    {
        $result = $this->freezerRepository->list();
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Buzdolabı getirme işlemi başarısız oldu'], 500);
        }
    }


    public function store(FreezerRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $result = $this->freezerRepository->create($validated);
        $data = $result->toArray();
        if (isset($data['id'])) {
            return response()->json($data,200);
        } else {
            return response()->json(['message' => 'Buzdolabı ekleme işlemi başarısız oldu'], 500);
        }
    }

    public function show($id)
    {
        $result = $this->freezerRepository->findById($id);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Ürün getirme işlemi başarısız oldu'], 500);
        }
    }

    // Bu metod, verilen ID'ye sahip buzdolabını güncelleyecek
    public function update(FreezerRequest $request, $id)
    {
        $validated = $request->validated();

        $result = $this->freezerRepository->update($validated,$id);

        if ($result) {
            return response()->json($validated,200);
        } else {
            return response()->json(['message' => 'Ürün güncelleme işlemi başarısız oldu'], 500);
        }
    }

    // Bu metod, verilen ID'ye sahip buzdolabını silecek
    public function destroy($id)
    {
        $result = $this->freezerRepository->delete($id);

        if ($result) {
            return response()->json(['message' => 'Ürün başarıyla silindi'],200);
        } else {
            return response()->json(['message' => 'Ürün silme işlemi başarısız oldu'], 500);
        }
    }

    // Bu metod, buzdolapları içerisinde adı ile arama yapacak
    public function search(Request $request)
    {
        $result = $this->freezerRepository->search($request->input('name'));
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Ürün getirme işlemi başarısız oldu'], 500);
        }
    }
}
