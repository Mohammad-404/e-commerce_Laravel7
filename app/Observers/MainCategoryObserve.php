<?php

namespace App\Observers;

use App\Models\MainCategory;

class MainCategoryObserve
{
    /**
     * Handle the main category "created" event.
     *
     * @param  \App\MainCategory  $mainCategory
     * @return void
     */
    public function created(MainCategory $mainCategory)
    {
        $mainCategory -> vendors() ->update(['active' => $mainCategory -> active]);
    }

    /**
     * Handle the main category "updated" event.
     *
     * @param  \App\MainCategory  $mainCategory
     * @return void
     */
    public function updated(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Handle the main category "deleted" event.
     *
     * @param  \App\MainCategory  $mainCategory
     * @return void
     */
    public function deleted(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Handle the main category "restored" event.
     *
     * @param  \App\MainCategory  $mainCategory
     * @return void
     */
    public function restored(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Handle the main category "force deleted" event.
     *
     * @param  \App\MainCategory  $mainCategory
     * @return void
     */
    public function forceDeleted(MainCategory $mainCategory)
    {
        //
    }
}
