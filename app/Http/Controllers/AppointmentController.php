<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Coach;
use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user()->role);
        try {
            if (auth()->user()->role == 'client') {
                $client_id = auth()->user()->id;
                $client = Client::where('user_id', $client_id)->first();
                $appointments = Appointment::where('client_id', $client_id)->get();
            } else {
                $coach_id = auth()->user()->id;
                $coach = Coach::findOrFail($coach_id);
                $appointments = $coach->appointments;
            }
            return  Inertia::render('Appointment/Index', [
                'appointments' => $appointments,
                'userType' => auth()->user()->role
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('calendar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'start_time' => 'required|string',
                'end_time' => 'required|string',
            ]);

            if (auth()->user()->role == 'client') {
                // update the appointemnt table
                $appointment = Appointment::where('start_time', '=', $validatedData['start_time'])->firstOrFail();

                $appointment->client_id = auth()->user()->id;
                $appointment->save();
            }

            $validatedData = $request->validate([
                'start_time' => 'required|string',
                'end_time' => 'required|string',
            ]);

            $coachId = auth()->user()->id;

            $appointment = new Appointment;
            $appointment->coach_id = $coachId;
            $appointment->start_time = $validatedData['start_time'];
            $appointment->end_time = $validatedData['end_time'];
            $appointment->status = $validatedData['status'] ?? 'pending';
            $appointment->save();
        } catch (\Throwable $th) {
            //throw $th;

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
