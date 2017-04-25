<?php


namespace Alnutile\Webforms\Tests\Unit;


use Alnutile\Webforms\Tests\TestCase;
use Alnutile\Webforms\Webform;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WebformsControllerTest extends TestCase
{

    use DatabaseMigrations;

    public function testGetExistingWebformDefaults() {

        $this->withoutMiddleware();

        factory(\Alnutile\Webforms\Webform::class, 5)->create();

        $webform = Webform::first();
        $this->get("/webforms")
            ->assertStatus(200)
            ->assertSee("Create Webform")
            ->assertSee("Webform Edit: " . $webform->id);
    }

    public function testShowWebformScreen() {

        $this->withoutMiddleware();

        $webform = factory(\Alnutile\Webforms\Webform::class)->create();

        $this->get("/webforms/" . $webform->id)
            ->assertStatus(200)
            ->assertSee("Webform")
            ->assertSee("Bar")
            ->assertDontSee("Name");


    }

}