<?php

namespace psaunders\Tests;

use psaunders\DateRangeType;
use Symfony\Component\Form\Test\TypeTestCase;

class DateRangeTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            'start' => 'test',
            'end' => 'test2'
        );

        $type = new DateRangeType();
        $form = $this->factory->create($type);
        
        //submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
    
    /**
     * Test the get name method (probably a waste of time)
     */
    public function testGetName()
    {
        $DateRangeType = new DateRangeType();
        $this->assertEquals('psaunders_date_range', $DateRangeType->getName());
    }
}
