# saxulum-http-client-adapter-zend

[![Build Status](https://api.travis-ci.org/saxulum/saxulum-http-client-adapter-zend.png?branch=master)](https://travis-ci.org/saxulum/saxulum-http-client-adapter-zend)
[![Total Downloads](https://poser.pugx.org/saxulum/saxulum-http-client-adapter-zend/downloads.png)](https://packagist.org/packages/saxulum/saxulum-http-client-adapter-zend)
[![Latest Stable Version](https://poser.pugx.org/saxulum/saxulum-http-client-adapter-zend/v/stable.png)](https://packagist.org/packages/saxulum/saxulum-http-client-adapter-zend)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/saxulum/saxulum-http-client-adapter-zend/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/saxulum/saxulum-http-client-adapter-zend/?branch=master)

## Features

 * Provides a http client interface adapter for [zend][1]

## Requirements

 * PHP 5.3+
 * Zend Http ~2.3

## Installation

Through [Composer](http://getcomposer.org) as [saxulum/saxulum-http-client-adapter-zend][2].

## Usage

``` {.php}
use Saxulum\HttpClient\Zend\HttpClient;
use Saxulum\HttpClient\Request;

$httpClient = new HttpClient();
$response = $httpClient->request(new Request(
    '1.1',
    Request::METHOD_GET,
    'http://en.wikipedia.org',
    array(
        'Connection' => 'close',
    )
));
```

You can inject your own zend client instance while creating the http client instance.

``` {.php}
use Zend\Http\Client;
use Saxulum\HttpClient\Zend\HttpClient;

$client = new Client;
$httpClient = new HttpClient($client);
```

[1]: https://packagist.org/packages/zendframework/zend-http
[2]: https://packagist.org/packages/saxulum/saxulum-http-client-adapter-zend