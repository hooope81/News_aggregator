<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait CategoryTrait
{
    public function getCategories(int $id = null): array
    {
        $categories = [];
        $quantityCategories = 5;

        if($id === null) {
            for($i = 1; $i < $quantityCategories; $i++) {
                $categories[$i] = [
                    'id' => $i,
                    'title' => \fake()->word()
                ];
            }
            return $categories;
        }

        return [
            'id' => $id,
            'title' => \fake()->word()
        ];
    }
}
