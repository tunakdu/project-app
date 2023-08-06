<?php

namespace App\Services\Interfaces;

interface FreezerProductInterface
{
    public function list(int $freezer_id);
    public function findById(int $product_id);
    public function create(array $details);
    public function update(array $details,int $product_id);
    public function delete(int $product_id);
    public function search(string $name);
}
