<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Course;
use App\Models\Type;
use App\Repositories\Course\CourseRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseAPIController extends Controller
{

    private $repository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->repository = $courseRepository;
    }


    public function index(): JsonResponse
    {
        return response()->json([
            'status' => 200,
            'data' => $this->repository->all(),
        ], 200);
    }

    public function getLesson($id): JsonResponse
    {
        $chapters = Course::find($id)->chapters;

        $chapters = $chapters->each(function ($chapter) {
            $chapter->lessons;
        });

        return response()->json([
            'status' => 200,
            'data' => $chapters
        ], 200);
    }

    public function getContent($slug): JsonResponse
    {
        $result = $this->repository->findBySlug($slug);

        return response()->json($result);
    }
}
