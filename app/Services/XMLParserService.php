<?php


namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;


class XMLParserService
{
    public function saveNews($link) {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        return $data;
    }
}