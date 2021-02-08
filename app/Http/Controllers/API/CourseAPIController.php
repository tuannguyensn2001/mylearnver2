<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseAPIController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 200,
            'data' => Course::all()
        ],200);
    }

    public function getLesson($id): \Illuminate\Http\JsonResponse
    {
        $chapters = Course::find($id)->chapters;

        $chapters = $chapters->each(function ($chapter){
            $chapter->lessons;
        });

        return response()->json([
            'status' => 200,
            'data' => $chapters
        ],200);
    }
}
