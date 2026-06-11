<?php

namespace App\Jobs\GenerateCatalog;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GeneratePointsJob extends AbstractJob
{
    public function handle()
    {
        $f = 1 / 0; //симулюємо помилку

        parent::handle();
    }
}
