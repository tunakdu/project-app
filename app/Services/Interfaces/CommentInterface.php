<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface CommentInterface
{
    public function list();
    public function findById(int $product_id);
    public function create(array $details);
    public function update(array $details,int $product_id);
    public function delete(int $product_id);
}
