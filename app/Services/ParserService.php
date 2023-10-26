<?php

namespace App\Services;

use App\Enums\News\Status;
use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use function fake;

class ParserService implements Parser {

    private string $link;

    public function saveParseData(): void {
        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate,category,enclosure::url]', // двоеточие для извлечения атрибута<enclosure url="http" type="image/jpeg"/>
            ],
        ]);
        //dd($data);
        foreach ($data['news'] as $news) {
            $category = Category::query()->firstOrCreate([ //если есть вернет модель категории если нет создаст категорию и вернет
                'title' => $news['category'],
            ]);
            News::query()->firstOrCreate(
                    ['title' => $news['title'],
                        'category_id' => $category->id,
                        'author' => $news['author'],
                        'status' => Status::ACTIVE->value,
                        'image' => $news['enclosure::url'],
                        'link' => $news['link'],
                        'description' => $news['description'],
                    //'created_at' => $news['pubDate']
                    ]
            );
        }
        
    }

    public function setLink(string $link): Parser {
        $this->link = $link;
        return $this;
    }

}
