<?php


namespace Alnutile\Webforms\Tests;


trait TestsHelper
{




    public function getFixture($file_name) {

        $file = file_get_contents(__DIR__ . '/../tests/fixtures/' . $file_name . '.json');

        return json_decode($file, true);

    }
}