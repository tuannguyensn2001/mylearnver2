<?php


namespace App\Traits;


use Carbon\Carbon;

trait CastDate
{
    public function getCreatedAtAttribute($date): string
    {
        return Carbon::parse($date)->toString();
    }

    public function getUpdatedAtAttribute($date): string
    {
        return Carbon::parse($date)->toString();
    }
}
