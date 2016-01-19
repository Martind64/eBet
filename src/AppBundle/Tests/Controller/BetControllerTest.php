<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BetControllerTest extends WebTestCase
{
    public function createBetTest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/bet/create');

        

    }


}
