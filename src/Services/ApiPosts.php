<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiPosts
{
    private HttpClientInterface $client;

    /**
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getPosts(){
        $rep = $this->client->request(
            'GET',
            "http://172.16.213.1:8000/api/posts",

        );
        return $rep->toArray();
    }
}