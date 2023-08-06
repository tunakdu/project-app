<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FreezerProduct;
use App\Models\Recipe;
use App\Services\Interfaces\RecipeInterface;
use App\Http\Requests\RecipeRequest;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    private RecipeInterface $recipeRepository;


    public function __construct(RecipeInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function index()
    {
        $result = $this->recipeRepository->list();
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Tarif getirme işlemi başarısız oldu'], 500);
        }
    }

    public function show($id)
    {
        $result = $this->recipeRepository->findById($id);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Tarif getirme işlemi başarısız oldu'], 500);
        }
    }

    public function store(RecipeRequest $request)
    {
        $validated = $request->validated();
        $result = $this->recipeRepository->create($validated);
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Tarif ekleme işlemi başarısız oldu'], 500);
        }
    }

    public function update(RecipeRequest $request, $id)
    {


        $validated = $request->validated();
        $result = $this->recipeRepository->update($validated,$id);

        if ($result) {
            return response()->json($validated,200);
        } else {
            return response()->json(['message' => 'Tarif güncelleme işlemi başarısız oldu'], 500);
        }
    }

    public function destroy($id)
    {
        $result = $this->recipeRepository->delete($id);

        if ($result) {
            return response()->json(['message' => 'Tarif başarıyla silindi'],200);
        } else {
            return response()->json(['message' => 'Tarif silme işlemi başarısız oldu'], 500);
        }
    }

    public function search(Request $request)
    {
        $result = $this->recipeRepository->search($request->input('title'));
        if ($result) {
            return response()->json($result,200);
        } else {
            return response()->json(['message' => 'Tarif getirme işlemi başarısız oldu'], 500);
        }
    }

    public function randomRecipe($id)
    {
        $freezerProduct = FreezerProduct::
        with('product')
            ->where('freezer_id', $id)
            ->get();

        $freezerProductData = $freezerProduct->toArray();

        $freezerGenelProduct = [];

        if (count($freezerProductData) > 0) {
            foreach ($freezerProductData as $product) {
                if ($product["unit"] > 0) {
                    array_push($freezerGenelProduct, $product["product"]["name"]);
                }
            }
        }

        $recipes = Recipe::all();

        $eligibleRecipes = [];
        foreach ($recipes as $recipe) {
            $recipeProducts = json_decode($recipe->products);

            $matchingProductCount = 0;
            foreach ($recipeProducts as $recipeProduct) {
                if (in_array($recipeProduct, $freezerGenelProduct)) {
                    $matchingProductCount++;
                }
            }

            if ($matchingProductCount >= 2) {
                $eligibleRecipes[] = $recipe;
            }
        }

        if (count($eligibleRecipes) > 0) {
            $randomIndex = array_rand($eligibleRecipes);
            $recommendedRecipe = $eligibleRecipes[$randomIndex];
            return $recommendedRecipe;
        } else {
            return null;
        }
    }

}
