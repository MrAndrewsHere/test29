<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;
use PDO;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_uses_sqlite_during_tests(): void
    {
        $this->assertEquals('testing', $this->app->environment());
        $this->assertEquals('sqlite', config('database.default'));
        $this->assertEquals('sqlite',
            DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME));

    }
}
