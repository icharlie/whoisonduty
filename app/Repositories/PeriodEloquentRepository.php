<?php  namespace App\Repositories;

use Carbon\Carbon;
use App\Period;

/**
 * @author iCharlie
 */
class PeriodEloquentRepository
{
    public function __construct(Period $period)
    {
        $this->period = $period;
    }


    /**
     * @return App\Period
     */
    public function getClosestPeriod()
    {
        $today = Carbon::today();
        $closestPeriod = $this->period
            ->whereStart('<=', $today)
            ->orWhere('end', '>', $today)
            ->orderBy('start')->first();
        if ($closestPeriod) {
            return $closestPeriod;
        }
        return null;
    }
}
