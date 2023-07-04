<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Parser;


class ParserController extends Controller

{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $news = $parser->setUrl('https://www.sport-express.ru/services/materials/news/se/')
            ->getNews();
        dd($news);

    }
}
