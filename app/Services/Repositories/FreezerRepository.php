<?php

namespace App\Services\Repositories;

use App\Models\Freezer;
use App\Services\Interfaces\FreezerInterface;
class FreezerRepository implements FreezerInterface
{
    public function list()
    {
        return Freezer::all();
    }

    public function findById(int $product_id)
    {
        return Freezer::query()->findOrFail($product_id);
    }

    public function create(array $details)
    {
        return Freezer::create($details);
    }

    public function update(array $details,int $product_id )
    {
        return Freezer::query()->where('id', $product_id)->update($details);
    }

    public function delete(int $product_id)
    {
        return Freezer::query()->where('id', $product_id)->delete();
    }

    public function search(string $name)
    {
        return Freezer::query()->where('name', 'like', '%' . $name . '%')->get();
    }
}
