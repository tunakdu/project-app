<?php

namespace App\Services\Repositories;

use App\Models\Recipe;
use App\Services\Interfaces\RecipeInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class RecipeRepository implements RecipeInterface
{
    public function list()
    {
        return Cache::remember('recipes', 60 * 24, function () {
            return Recipe::all();
        });

    }

    public function findById(int $product_id)
    {
        return Recipe::query()->findOrFail($product_id);
    }

    public function create(array $details)
    {
        $title = $details["title"];
        $description = $details['description'];
        $products = $details['products'];

        $jsonProducts = json_encode($products);

        $recipe = new Recipe();
        $recipe->title = $title;
        $recipe->description = $description;
        $recipe->products = $jsonProducts;
        $recipe->save();

        return response()->json(['message' => 'Tarif başarıyla eklendi.'], Response::HTTP_OK);
    }

    public function update(array $details, int $product_id)
    {
        $jsonProducts = json_encode($details["products"],true);

        // update işlemi yapılacak

        $update = Recipe::where('id', $product_id)->first();
        $update->title = $details['title'];
        $update->description = $details['description'];
        $update->products = $jsonProducts;
        $update->save();

        return response()->json(['message' => 'Tarif başarıyla güncellendi.'], Response::HTTP_OK);

    }

    public function delete(int $product_id)
    {
        return Recipe::query()->where('id', $product_id)->delete();
    }

    public function search(string $name)
    {
        return Recipe::query()->where('title', 'like', '%' . $name . '%')->get();
    }
}
