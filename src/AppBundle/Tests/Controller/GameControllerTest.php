<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Form\Type\GameType;
use AppBundle\Entity\Game;
use Symfony\Component\Form\Test\TypeTestCase;

class GameControllerTest extends TypeTestCase
{
    public function testSubmittedData()
    {
        $formData = array(
            'name' => 'CSS',
            'logo' => 'img',
        );

        $type = new GameType();
        $form = $this->factory->create($type);

//        $object = Game::fromArray($formData);

        $form->submit($formData);
        $this->assertTrue($form->isSynchronized());
//        $this->assertEquals($object, $form->getData());
        $view = $form->createView();
        $children = $view->children;

        foreach(array_keys($formData) as $key)
        {
            $this->assertArrayHasKey($key, $children);
        }








    }
}
