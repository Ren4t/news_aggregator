<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller {

    public function __invoke(Request $request, Parser $parser) { //Parser нужно забиндить в Providers/AppServiceProvider.php
        $url = "https://lenta.ru/rss";
        // $url2 = "https://news.rambler.ru/rss/community/";

        $parser->setLink($url)->saveParseData(); // заб
    }

}
