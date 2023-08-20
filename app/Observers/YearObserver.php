<?php

namespace App\Observers;

use App\Models\Year;

class YearObserver
{
    /**
     * Handle the Year "created" event.
     *
     * @param  \App\Models\Year  $year
     * @return void
     */
    public function saving(Year $year)
    {
        Year::query()->update(['is_current' => false]);
        $year->is_current = true;
    }
    public function created(Year $year)
    {
    }

    /**
     * Handle the Year "updated" event.
     *
     * @param  \App\Models\Year  $year
     * @return void
     */
    public function updated(Year $year)
    {
        //
    }

    /**
     * Handle the Year "deleted" event.
     *
     * @param  \App\Models\Year  $year
     * @return void
     */
    public function deleted(Year $year)
    {
        $last = Year::query()->orderByDesc('id')->first();
        if ($last) {
            $last->update(['is_current' => true]);
        }
    }

    /**
     * Handle the Year "restored" event.
     *
     * @param  \App\Models\Year  $year
     * @return void
     */
    public function restored(Year $year)
    {
        //
    }

    /**
     * Handle the Year "force deleted" event.
     *
     * @param  \App\Models\Year  $year
     * @return void
     */
    public function forceDeleted(Year $year)
    {
        $last = Year::query()->orderByDesc('id')->first();
        if ($last) {
            $last->update(['is_current' => true]);
        }
    }
}