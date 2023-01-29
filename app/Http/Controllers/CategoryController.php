<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $model = new Category();
        $categories = $model->getCategories();

        return \view('categories.index', [
            'categories' => $categories
        ]);
    }

//    public function show(int $id)
//    {
//        return \view('categories.show', [
//            'news' => $this->getNewsByIdCategory($id)
//        ]);
//    }

}
