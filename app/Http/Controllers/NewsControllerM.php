<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsControllerM extends Controller
{
    private $newsArray = [
        [
        'id' => 1,
        'title' => 'Новость',
        'inform' => 'Новость 1 тут подробнее'
    ],
        [
        'id' => 2,
        'title' => 'Новость',
        'inform' => 'Новость 2 тут подробнее'
    ],
        [
        'id' => 3,
        'title' => 'Новость',
        'inform' => 'Новость 3 тут подробнее'
    ]
    ];
    
    public function news() {
        $html = "<h1>Новости</h1>";
        foreach ($this->newsArray as $news) {
            $html .= <<<php
            <h2>{$news['title']}</h2>
            <div>{$news['inform']}<a href="/news/{$news['id']}">
                >>>
                </a></div>
            <hr>
            php;
        }
        return $html;
    }
    
    public function newsOne($id) {
        $news = $this->getNewsById($id);
        
        if(!empty($news))
        {
            $html = <<<php
                    <h1>{$news['title']}</h1>
                    <div>{$news['inform']}</div>
                    <hr>
                    <a href="/news">Назад</a>
                    php;
                    return $html;
        }
        return redirect('/news');
    }
    
    private function getNewsById($id) {
        foreach ($this->newsArray as $news){
            if($news['id'] == $id)
            {
                return $news;
            }
        }
        return [];
    }
}
