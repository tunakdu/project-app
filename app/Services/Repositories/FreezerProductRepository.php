<?php

namespace App\Services\Repositories;

use App\Models\FreezerProduct;
use App\Services\Interfaces\FreezerProductInterface;

class FreezerProductRepository implements FreezerProductInterface
{
    public function list($freezer_id)
    {
        return FreezerProduct::query()
            ->with('product')
            ->where('freezer_id', $freezer_id)
            ->get();
    }


    public function findById(int $product_id)
    {
        return FreezerProduct::query()->findOrFail($product_id);
    }

    public function create(array $details)
    {
        return FreezerProduct::create($details);
    }

    public function update(array $details,int $product_id )
    {
        return FreezerProduct::query()->where('id', $product_id)->update($details);
    }

    public function delete(int $product_id)
    {
        return FreezerProduct::query()->where('id', $product_id)->delete();
    }

    public function search(string $name)
    {
        return FreezerProduct::query()->where('name', 'like', '%' . $name . '%')->get();
    }
}
