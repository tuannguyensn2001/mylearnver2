<?php


namespace App\Repositories\Course;


use App\Models\Course;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class CourseRepository implements CourseRepositoryInterface
{

    public function all()
    {
        return Course::with('tag', 'tag.category')->get();
    }

    public function findBySlug($slug)
    {
        $course = Course::query()
            ->with('tag', 'level', 'chapters', 'chapters.lessons')
            ->where('slug', $slug)->first();
        $course->contents = $this->contents($course->id);

        return $course;
    }

    private function contents($course_id)
    {
        return Type::with([
            'contents' => function ($query) use ($course_id) {
                $query->where('course_id', $course_id);
            }
        ])->get();
    }

    public function getLessons($slug)
    {
        return Course::query()
            ->with('chapters', 'chapters.lessons')
            ->where('slug',$slug)
            ->first();
    }
}
