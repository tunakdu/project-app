<?php

namespace App\Services\Repositories;

use App\Models\Comment;
use App\Services\Interfaces\CommentInterface;

class CommentRepository implements CommentInterface
{
    public function list()
    {
        return Comment::all();
    }

    public function findById(int $product_id)
    {
        return Comment::query()->findOrFail($product_id);
    }

    public function create(array $details)
    {
        return Comment::create($details);
    }

    public function update(array $details,int $product_id )
    {
        return Comment::query()->where('id', $product_id)->update($details);
    }

    public function delete(int $product_id)
    {
        return Comment::query()->where('id', $product_id)->delete();
    }

}
