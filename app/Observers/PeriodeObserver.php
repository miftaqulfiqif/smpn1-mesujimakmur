<?php

namespace App\Observers;

use App\Models\PeriodeDaftar;

class PeriodeObserver
{
    public function updated(PeriodeDaftar $periodeDaftar): void
    {
        if ($periodeDaftar->kuota == 0) {
            $periodeDaftar->status = false;
            $periodeDaftar->save();
        }
    }
}
