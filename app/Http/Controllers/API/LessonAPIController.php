<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Repositories\Course\CourseRepositoryInterface;
use Illuminate\Http\Request;

class LessonAPIController extends Controller
{
    public function findBySlug($course,$lesson): \Illuminate\Http\JsonResponse
    {
        $lesson = Lesson::query()
            ->where('slug',$lesson)
            ->whereExists(function($query) use ($course) {
                $query->select('*')
                    ->from('chapters')
                    ->whereColumn('chapters.id','lessons.chapter_id')
                    ->where('chapters.course_id',1);
            })
            ->first();

        return response()->json([
            'status' => 200,
            'data' => $lesson,
        ]);



    }
}
