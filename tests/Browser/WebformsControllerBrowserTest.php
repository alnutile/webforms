<?php

namespace Alnutile\Webforms\Tests\Browser;

use Alnutile\Webforms\Webform;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;


class WebformsControllerBrowserTest extends TestCase
{

    use DatabaseMigrations;

    public function testCreateWebformController() {
        $this->withoutMiddleware();

        DB::table('webforms')->truncate();

        factory(\Alnutile\Webforms\Webform::class, 4)->create();

        $this->browse(function ($browser)  {
            /** @var $browser Browser */
            $browser->visit('/webforms/create')
                ->type('name', "Foo Updated")
                ->assertSee("Webform Create")
                ->select("country", "foo_baz")
                ->type('description', "Foo Updated Description")
                ->press('Save');
        });

        \PHPUnit_Framework_Assert::assertCount(5, Webform::all()->toArray());

        $webform = Webform::latest()->first();

        \PHPUnit_Framework_Assert::assertEquals('Foo Updated',
            $webform->data['name']['default_value'],
            "Seems the name was not updated");

        \PHPUnit_Framework_Assert::assertEquals('Foo Updated Description',
            $webform->data['description']['default_value'],
            "Seems the description was not updated");

        \PHPUnit_Framework_Assert::assertEquals('foo_baz',
            $webform->data['country']['default_value'],
            "Seems the country was not updated");

        //Not ready for this just yet
        \PHPUnit_Framework_Assert::assertNotNull($webform->default_values);


    }

    public function testUpdateWebformController() {
        $this->withoutMiddleware();

        DB::table('webforms')->truncate();

        $webform = factory(\Alnutile\Webforms\Webform::class)->create();

        $data = $webform->data;
        $data['country']['default_value'] = 'foo_baz';
        $webform->data = $data;
        $webform->default_values = $data;
        $webform->save();

        $this->browse(function ($browser) use ($webform) {
            /** @var $browser Browser */
            $browser->visit(sprintf('/webforms/%d/edit', $webform->id))
                ->assertSelected('country', "foo_baz")
                ->type('name', "Foo Updated Again")
                ->select("country", "foo_boo")
                ->type('description', "Foo Updated Description Again")
                ->press("Save");
        });


        $webform = Webform::latest()->first();

        \PHPUnit_Framework_Assert::assertEquals('Foo Updated Again', $webform->data['name']['default_value'],
            "Seems the name was not updated");

        \PHPUnit_Framework_Assert::assertEquals('Foo Updated Description Again', $webform->data['description']['default_value'],
            "Seems the description was not updated");

        \PHPUnit_Framework_Assert::assertEquals('foo_boo', $webform->data['country']['default_value'],
            "Seems the country was not updated");


        \PHPUnit_Framework_Assert::assertNotNull($webform->default_values);

    }

}