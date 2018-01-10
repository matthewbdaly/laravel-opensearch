<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Matthewbdaly\LaravelOpensearch\Http\Controllers\OpensearchController;
use Mockery as m;

class OpensearchControllerTest extends TestCase
{
    /**
     * Test we can return the XML response
     *
     * @return void
     */
    public function testGetXml()
    {
        $this->app['config']->set('opensearch.description', 'Search example.com');
        $this->app['config']->set('opensearch.shortname', 'example.com');
        $this->app['config']->set('opensearch.template', 'http://example.com/search?q={searchTerms}');
        $controller = new OpensearchController;
        $response = $controller->index();
        $expected = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<OpenSearchDescription xmlns:moz="http://www.mozilla.org/2006/browser/search/"
   xmlns="http://a9.com/-/spec/opensearch/1.1/">
   <ShortName>example.com</ShortName>
   <Description>Search example.com</Description>
   <InputEncoding>UTF-8</InputEncoding>
   <Url method="get" type="text/html"
      template="http://example.com/search?q={searchTerms}"/>
</OpenSearchDescription>
EOF;
        $this->assertEquals($expected, trim($response->getContent()));
        $this->assertEquals('text/xml', $response->headers->get('Content-Type'));
    }
}
