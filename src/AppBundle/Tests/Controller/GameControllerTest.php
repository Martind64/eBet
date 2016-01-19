<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/game/create');

        $form = $crawler->selectButton('submit')->form();

        $form['name'] = 'Hearthstone';
        $logo['logo'] = 'img';

        $crawler = $client->submit($form);







    }
}
