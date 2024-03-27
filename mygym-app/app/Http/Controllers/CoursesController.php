<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userrole = Auth::user()->role_id;
        $corsi = Courses::all();
        if ($userrole == 2) {
            return view('corsi', ['corsi' => $corsi]);
        } elseif ($userrole == 1) {
            return view('corsiadmin', ['corsi' => $corsi]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creacorsoadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'day' => 'required|in:Lunedì,Martedì,Mercoledì,Giovedì,Venerdì,Sabato,Domenica',
            'starthours' => 'required|date_format:H:i',
            'endhours' => 'required|date_format:H:i|after:starthours',
            'price' => 'required|numeric|min:0',
        ]);

        $course = Courses::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'day' => $validatedData['day'],
            'starthours' => $validatedData['starthours'],
            'endhours' => $validatedData['endhours'],
            'price' => $validatedData['price'],
        ]);

        return redirect()->route('course.show', $course->id)->with('success', 'Corso creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courses $course)
    {

        $userrole = Auth::user()->role_id;

        if ($userrole == 2) {
            return view('dettagliocorso', ['course' => $course]);
        } elseif ($userrole == 1) {
            $utentiiscritti = Booking::where('course_id', $course->id)->where('stato', 'accettato')->with('user')->get();

            return view('dettagliocorsoadmin', ['course' => $course, 'utentiiscritti' => $utentiiscritti]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courses $course)
    {
        return  view('modificacorsoadmin', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courses $course)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'day' => 'nullable|in:Lunedì,Martedì,Mercoledì,Giovedì,Venerdì,Sabato,Domenica',
            'starthours' => 'nullable|date_format:H:i',
            'endhours' => 'nullable|date_format:H:i|after:starthours',
            'price' => 'required|numeric|min:0',
        ]);

        $course->update($validatedData);
    
        return redirect()->route('course.show', $course->id)->with('success', 'Corso aggiornato con successo.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $course)
    {
        $course->delete();
        return redirect(route('course.index'))->with('success', 'Corso eliminato con successo.');
    }
}
