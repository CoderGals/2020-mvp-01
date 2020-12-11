<?php

namespace App\Models\Traits;

use Carbon\Carbon;


trait HasUniqueNumber
{
    /**
     * Bootable method. Runs on boot() of the model.
     * @return void
     */
    public static function bootHasUniqueNumber() : void
    {
        static::creating(function ($model) {
            $model->number =  wordwrap(strtoupper(dechex(Carbon::now()->timestamp."".$model->id)), 4, '-', true);
        });
    }

}

