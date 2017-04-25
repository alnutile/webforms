<?php


namespace Alnutile\Webforms\Tests\Unit;


use Alnutile\Webforms\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class ConfigTest extends TestCase
{

    public function testConfigSettings() {
        $defaults = Config::get('webform.defaults');

        \PHPUnit_Framework_Assert::assertEquals('textarea',
            $defaults['description']['field_element']);

        \PHPUnit_Framework_Assert::assertEquals('multiple_select',
            $defaults['country']['field_element']);

        \PHPUnit_Framework_Assert::assertEquals('input',
            $defaults['name']['field_element']);
    }

}