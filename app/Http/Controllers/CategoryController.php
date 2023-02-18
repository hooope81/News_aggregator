<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()->get();

        return \view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id): View
    {
        $news = News::withWhereHas(
            'categories',
            fn ($query) => $query->where('categories.id', $id)
        )->get();

//        dd($news);

        return \view('categories.show', [
            'news' => $news
        ]);
    }

}
