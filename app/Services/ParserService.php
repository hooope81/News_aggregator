<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;
    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate, category]'
            ]

        ]);

        $e = explode('/', $this->link);
        $fileName = end($e);
        $jsonEncode = json_encode($data);

        Storage::append('news/' . $fileName, $jsonEncode);
    }

    public function saveNews()
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url,category,author]'],

        ]);
        foreach ($data['news'] as $news) {

            if (!$news['category']) {
                $categoryName = $data['title'];
            } else {
                $categoryName = $news['category'];
            }
            $category = Category::query()->firstOrCreate([
                'title' => $categoryName,
            ]);

            $category->save();

            $n = News::query()->firstOrCreate([
                'title' => $news['title'],
                'description' => $news['description'],
                'image' => $news['enclosure::url'],
                'author' => $news['author'],
                'status' => 'active',
            ]);

            $n->categories()->attach($category->id);
            $n->save();

      }



    }
}
