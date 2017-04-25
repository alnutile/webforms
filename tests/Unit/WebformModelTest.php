<?php


namespace Alnutile\Webforms\Tests\Unit;


use Alnutile\Webforms\Tests\TestCase;
use Alnutile\Webforms\Webform;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class WebformModelTest extends TestCase
{

    use DatabaseMigrations;

    public function testCreateWebform() {

        $webform = factory(\Alnutile\Webforms\Webform::class)->create();

        \PHPUnit_Framework_Assert::assertNotNull($webform->data, "This should have been saved");

        \PHPUnit_Framework_Assert::assertEquals("Foo Bar", $webform->data['name']['default_value']);
    }

    public function testUpdateFromFormSubmission() {
        $payload = file_get_contents(__DIR__ . '/../fixtures/form_submission.json');
        $payload = json_decode($payload, true);

        $defaults = Config::get("webform.defaults");

        $model = new Webform();

        $results = $model->mergeFormPayloadAndDefaults($payload, $defaults);

        \PHPUnit_Framework_Assert::assertEquals("foo_baz", $results['country']['default_value']);
        \PHPUnit_Framework_Assert::assertEquals("Foo Updated", $results['name']['default_value']);
        \PHPUnit_Framework_Assert::assertEquals("Foo Updated Description", $results['description']['default_value']);

    }

    public function testDefaultValuesOnCreate() {

        $this->markTestIncomplete("Not sure this is the direction I want to go");

        $model = new Webform();

        $default_values_updated = File::get(base_path('workbench/alnutile/webforms/tests/fixtures/default_values.json'));
        $default_values_updated = json_decode($default_values_updated, true);

        $payload = file_get_contents(__DIR__ . '/../fixtures/form_submission.json');
        $payload = json_decode($payload, true);
        $payload['default_values'] = $default_values_updated;


        $webform = $model->saveNewFromFormRequest($payload);



    }



}