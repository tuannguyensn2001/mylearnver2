<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;

class HomeController extends Controller
{
    public function index()
    {


//        foreach (Course::all() as $course) {
//            Debugbar::info('course');
//            Debugbar::info($course);
//            foreach ($course->chapters as $chapter) {
//                Debugbar::info($chapter->lessons);
//            }
//        }
//        return view('frontend.home');

        $user = User::with('courses')->first();


        return response()->json($user);


    }

    public function vue($course,$any)
    {
        return view('frontend.lesson');
    }
}
