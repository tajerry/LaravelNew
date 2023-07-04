<?php

namespace App\Services;

use Orchestra\Parser\Xml\Facade as Parser;
use App\Contracts\Parser as Contract;
class ParserService implements Contract
{
    protected string $url;
    /**
     * @inheritDoc
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getNews(): array
    {
        $xml = Parser::load($this->url);
        $data = $xml->parse([
            'title' =>[
                'uses' => 'channel.title'
            ],
            'link' =>[
                'uses' => 'channel.link'
            ],
            'description' =>[
                'uses' => 'channel.description'
            ],
            'image' =>[
                'uses' => 'channel.image.url'
            ],
            'news' =>[
                'uses' => 'channel.item[title, link, guid, description, pubDate]'
            ],
        ]);
        return  $data['news'];
    }
}
