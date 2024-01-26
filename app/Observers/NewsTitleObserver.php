<?php

namespace App\Observers;

use App\Models\NewsTitle;

class NewsTitleObserver
{
    /**
     * Handle the NewsTitle "created" event.
     *
     * @param  \App\Models\NewsTitle  $newsTitle
     * @return void
     */
    public function created(NewsTitle $newsTitle)
    {
        //
    }

    /**
     * Handle the NewsTitle "updated" event.
     *
     * @param  \App\Models\NewsTitle  $newsTitle
     * @return void
     */
    public function updated(NewsTitle $newsTitle)
    {
        //
    }

    /**
     * Handle the NewsTitle "deleted" event.
     *
     * @param  \App\Models\NewsTitle  $newsTitle
     * @return void
     */
    public function deleted(NewsTitle $newsTitle)
    {
        //
    }

    /**
     * Handle the NewsTitle "restored" event.
     *
     * @param  \App\Models\NewsTitle  $newsTitle
     * @return void
     */
    public function restored(NewsTitle $newsTitle)
    {
        //
    }

    /**
     * Handle the NewsTitle "force deleted" event.
     *
     * @param  \App\Models\NewsTitle  $newsTitle
     * @return void
     */
    public function forceDeleted(NewsTitle $newsTitle)
    {
        //
    }
}
