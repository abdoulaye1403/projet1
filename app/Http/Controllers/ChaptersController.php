<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChaptersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware('auth');
     }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,Course $course)
    {
        $course_id = $course->id;
        return view('pages.chapters.create', compact('course_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        Chapter::create([
            'title' => $request->title,
            'content' => $request->content,
            'course_id' => $request->course_id,
        ]);

         return redirect()->route('courses.index')->with('success', 'Chapitre ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course,Chapter $chapter)
    {
        if ($chapter->course_id !== $course->id) {
            abort(404, 'Chapitre non trouvé dans ce cours');
        }
    
        return view('pages.chapters.show', compact('course', 'chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Course $course)
    {
        $course_id = $course->id;
        return view('pages.chapters.edit', compact('course_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $chapter->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

         return redirect()->route('courses.show', $chapter->course_id )->with('success', 'Chapitre modifie avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        if($chapter && $chapter->id != null) {
            $chapter->delete();
        }

        return redirect()->route('courses.show', $chapter->course_id)->with('success', 'chapitre supprimé avec success');
    }
}
