<?php

namespace Saxulum\HttpClient\Zend;

use Zend\Http\Client;
use Zend\Http\Headers;
use Zend\Http\Request as ZendRequest;
use Zend\Http\Response as ZendResponse;
use Saxulum\HttpClient\HttpClientInterface;
use Saxulum\HttpClient\Request;
use Saxulum\HttpClient\Response;

class HttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client = null)
    {
        $this->client = null !== $client ? $client : new Client(null, array(
            'maxredirects' => 5
        ));
    }

    /**
     * @param  Request  $request
     * @return Response
     */
    public function request(Request $request)
    {
        $headers = new Headers();
        $headers->addHeaders($request->getHeaders());

        $zendRequest = new ZendRequest();
        $zendRequest->setVersion($request->getProtocolVersion());
        $zendRequest->setMethod($request->getMethod());
        $zendRequest->setUri((string) $request->getUrl());
        $zendRequest->setHeaders($headers);
        $zendRequest->setContent($request->getContent());

        /** @var ZendResponse $zendResponse */
        $zendResponse = $this->client->send($zendRequest);

        return new Response(
            (string) $zendResponse->getVersion(),
            $zendResponse->getStatusCode(),
            $zendResponse->getReasonPhrase(),
            $zendResponse->getHeaders()->toArray(),
            $zendResponse->getContent()
        );
    }
}
