<?php


namespace Alnutile\Webforms\Tests\Browser;

use Alnutile\Webforms\Tests\TestsHelper;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class TestCase extends DuskTestCase
{


    use TestsHelper;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub


        $this->app->make('Illuminate\Database\Eloquent\Factory')
            ->load(__DIR__ . '/../../database/factories');

    }

}