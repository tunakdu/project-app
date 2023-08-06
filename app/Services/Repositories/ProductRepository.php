<?php

namespace App\Services\Repositories;

use App\Models\Product;
use App\Services\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    public function list()
    {
        return Product::all();
    }

    public function findById(int $product_id)
    {
        return Product::query()->findOrFail($product_id);
    }

    public function create(array $details)
    {
        return Product::create($details);
    }

    public function update(array $details,int $product_id )
    {
        return Product::query()->where('id', $product_id)->update($details);
    }

    public function delete(int $product_id)
    {
        return Product::query()->where('id', $product_id)->delete();
    }

    public function search(string $name)
    {
        return Product::query()->where('name', 'like', '%' . $name . '%')->get();
    }
}
