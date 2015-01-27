<?php

use Carbon\Carbon;

class PeriodTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
    }

    public function tearDown()
    {
        DB::rollback();
    }

    public function testPeriodCreation()
    {
        $period = new App\Period;
        $period->start = Carbon::now();
        $period->end = Carbon::tomorrow();
        $this->assertTrue($period->save());
    }
}
