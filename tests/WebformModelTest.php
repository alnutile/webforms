<?php


namespace Alnutile\Webforms\Tests;


use Alnutile\Webforms\Webform;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WebformModelTest extends TestCase
{

    use DatabaseMigrations;

    public function testCreateWebform() {

        $webform = factory(\Alnutile\Webforms\Webform::class)->create();

        \PHPUnit_Framework_Assert::assertNotNull($webform->data, "This should have been saved");
    }

}