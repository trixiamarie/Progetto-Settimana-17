<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Courses;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        if ($role_id == 2) {
            $prenotazioni = Booking::with('corso')->where("user_id", "=", Auth::getUser()->id)->get();

            return view('mieprenotazioni', [
                'prenotazioni' => $prenotazioni,
            ]);
        } else if ($role_id == 1) {
            $utentiiscritti = Booking::with('corso', 'user')->get();
            return view('prenotazioniadmin', ['utentiiscritti' => $utentiiscritti]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $selectedCourseId = $request->course;
        $courses = Courses::all();


        return view('prenotazione', compact('courses', 'selectedCourseId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingBooking = Booking::where('user_id', auth()->id())
            ->where('course_id', $request->course_id)
            ->exists();

        if ($existingBooking) {
            return redirect()->route('dashboard')->with('warning', 'Hai già effettuato una prenotazione per questo corso.');
        }

        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $booking = new Booking();

        $booking->course_id = $request->course_id;
        $booking->user_id = auth()->id();

        $booking->save();

        return redirect()->route('dashboard')->with('success', 'Prenotazione effettuata con successo!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'stato' => 'required|in:accettato,negato',
        ]);
    
        $booking->stato = $validatedData['stato'];
        $booking->updated_at = now();
    
        $booking->save();
    
        $message = '';
        switch ($booking->stato) {
            case 'accettato':
                $message = 'Booking accettato con successo.';
                break;
            case 'negato':
                $message = 'Booking negato con successo.';
                break;
            default:
                $message = 'Stato del booking aggiornato con successo.';
                break;
        }
    
        return back()->with('success', $message);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('dashboard')->with('success', 'Prenotazione eliminata con successo.');
    }
}
