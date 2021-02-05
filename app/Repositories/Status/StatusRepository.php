<?php


namespace App\Repositories\Status;


use App\Models\Status;

class StatusRepository implements StatusRepositoryInterface
{

    public function all()
    {
        return Status::all();
    }
}
