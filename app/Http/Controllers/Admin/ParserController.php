<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\Source;
use App\QueryBuilders\NewsQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return Response|string
     */
    public function __invoke(
        Request $request,
        Parser $parser,
        NewsQueryBuilder $newsQueryBuilder
    ): \Illuminate\Http\Response|string
    {
        $urls = (Source::query()->get('URL'))->toArray();

        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url['URL']));
        }

        return 'Parsing completed';

    }
}
