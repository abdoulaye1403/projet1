<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('home',compact('courses'));
    }
    public function show(Course $course)
    {
        $teachers = Teacher::all();
        return view('homeCourseShow', compact('course', 'teachers'));
    }

}