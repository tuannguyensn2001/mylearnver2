<?php


namespace App\Repositories\Course;


interface CourseRepositoryInterface
{
    public function all();

    public function findBySlug($slug);

    public function getLessons($slug);

}
