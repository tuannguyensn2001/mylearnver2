<?php


namespace App\Repositories\Chapter;


use App\Models\Chapter;

class ChapterRepository implements ChapterRepositoryInterface
{

    public function all()
    {
        return Chapter::all();
    }
}
