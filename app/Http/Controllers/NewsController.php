<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{

    public function index(): View
    {
        $model = new News();
        $news = $model->getNews();

        return \view('news.index', [
            'news' => $news
        ]);
    }

    public function show(int $id): View
    {
        $model = new News();
        $news = $model->getNewsById($id);

        return \view('news.show', [
            'news' => $news
        ]);
    }
}
