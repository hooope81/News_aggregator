<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SourceController extends Controller
{
    public function index(): View
    {
        $model = new Source();
        $sources = $model->getSources();

        return \view('admin.sources', [
            'sources' => $sources
        ]);

    }
}
