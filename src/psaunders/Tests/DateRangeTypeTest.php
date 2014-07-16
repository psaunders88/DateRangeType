<?php

namespace psaunders\Tests;

use psaunders\DateRangeType;
use Symfony\Component\Form\Test\TypeTestCase;

class DateRangeTypeTest extends TypeTestCase
{
    /**
     * Test that valid submit works
     */
    public function testSubmitValidData()
    {
        $formData = array(
            'start' => [
                'day' => '01',
                'month' => '06',
                'year' => '1988'
            ],
            'end' => [
                'day' => '16',
                'month' => '07',
                'year' => '2014'
            ]
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
