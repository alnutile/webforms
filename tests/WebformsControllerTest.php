<?php


namespace Alnutile\Webforms\Tests;


use Illuminate\Foundation\Testing\DatabaseMigrations;

class WebformsControllerTest extends TestCase
{

    use DatabaseMigrations;

    public function testGetExistingWebformDefaults() {

        $this->withoutMiddleware();



    }

}