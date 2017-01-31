<?php

namespace SIGE\SecurityManagerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ModuloControllerTest extends WebTestCase
{
    public function testGetmodulos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getModulos');
    }

}
