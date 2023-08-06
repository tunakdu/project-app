<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Services\Interfaces\CommentInterface;


class CommentController extends Controller
{

    private CommentInterface $commentRepository;


    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $result = $this->commentRepository->list();
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Yorumları getirme işlemi başarısız oldu'], 500);
        }
    }

    public function store(CommentRequest $request)
    {
        $validated = $request->validated();
        $result = $this->commentRepository->create($validated);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Yorum ekleme işlemi başarısız oldu'], 500);
        }
    }

    // Belirli bir freezer ürününü getir
    public function show($id)
    {
        $result = $this->commentRepository->findById($id);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Yorum getirme işlemi başarısız oldu'], 500);
        }
    }

    // Bir freezer ürününü güncelle
    public function update(CommentRequest $request, $id)
    {

        $validated = $request->validated();

        $result = $this->commentRepository->update($validated,$id);

        if ($result) {
            return response()->json($validated,200);
        } else {
            return response()->json(['message' => 'Yorum güncelleme işlemi başarısız oldu'], 500);
        }
    }

    // Bir freezer ürününü sil
    public function destroy($id)
    {
        $result = $this->commentRepository->delete($id);

        if ($result) {
            return response()->json(['message' => 'Yorum başarıyla silindi'],200);
        } else {
            return response()->json(['message' => 'Yorum silme işlemi başarısız oldu'], 500);
        }
    }
}
