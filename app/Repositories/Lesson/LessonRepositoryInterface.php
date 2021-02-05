<?php


namespace App\Repositories\Lesson;


interface LessonRepositoryInterface
{
    public function create($data);

    public function find($id);

    public function update($id,$data);
}
