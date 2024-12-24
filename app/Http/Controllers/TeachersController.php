<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
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
        $teachers = Teacher::with('user')->get(); // Récupère tous les professeurs avec leurs utilisateurs;
        return view("pages.teachers.index", compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.teachers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:male,female,other',
            'grade' => 'required|in:Master,Doctorat',
            'dateofbirth' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::where('name', 'teacher')->first()->id, // Attribuer directement le rôle de professeur
        ]);

        // Créer le professeur lié à l'utilisateur
        Teacher::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'dateofbirth' => $request->dateofbirth,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Professeur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Teacher::with('user')->findOrFail($id);
        return view('pages.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('pages.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'gender' => 'required|in:male,female,other',
            'grade' => 'required|in:Master,Doctorat',
            'dateofbirth' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
    
        $teacher = Teacher::findOrFail($id);
    
        // Mise à jour de l'utilisateur lié
        $teacher->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        // Mise à jour des informations du professeur
        $teacher->update([
            'gender' => $request->gender,
            'grade' => $request->grade,
            'dateofbirth' => $request->dateofbirth,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
    
        return redirect()->route('teachers.index')->with('success', 'Professeur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if($teacher && $teacher->id != null) {
            $teacher->user->delete();
            $teacher->delete();
        }

        return redirect()->route('teachers.index')->with('success', 'professeur supprimée avec success');
    }
}
