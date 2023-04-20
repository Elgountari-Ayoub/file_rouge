<?php

namespace App\Http\Controllers;

// use auth;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Redirect;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $coachId = auth()->user()->id;
            $coach = Coach::where('user_id', $coachId)->first();

            return Inertia::render('Coaches/Index', [
                'coach' => $coach,
            ]);
        } catch (\Throwable $th) {
            return to_route('/');
            // throw $th;
        }
    }

    public function calendar()
    {
        try {
            return  Inertia::render('Coaches/Calendar');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function coachesList(Request $request)
    {
        try {
            return Inertia::render('Coaches/CoachesList', [
                'coaches' => Coach::latest()->filter(request(['search']))->get(),
            ]);
        } catch (\Throwable $th) {
            return to_route('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $user = Auth::user();
            if ($user->role == 'coach') {
                $this->index();
                return;
            }
            return Inertia::render('Coaches/Create');
        } catch (\Throwable $th) {
            return to_route('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'photo' => 'required|image',
                'country' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'specialization' => 'required|string|max:255',
                'story' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
            ]);

            $user = auth()->user();
            $coach = new Coach();

            $coach->user_id = $user->id;
            $coach->name    = $user->name;
            $coach->email = $user->email;
            $coach->password = $user->password;
            $coach->photo = $validatedData['photo'];
            $coach->country = $validatedData['country'];
            $coach->phone = $validatedData['phone'];
            $coach->specialization = $validatedData['specialization'];
            $coach->experience = $validatedData['experience'];
            $coach->story = $validatedData['story'];


            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoPath = $photo->store('public/coaches_photos');
                $coach->photo = str_replace('public/', '', $photoPath);
            }

            $coach->save();

            $coachId = auth()->user()->id;
            $user = User::whereIn('id', [$coachId])
                ->update(['role' => 'coach']);

            // return Inertia::render('Coaches/Index');
            return to_route('coaches.index');
        } catch (\Throwable $th) {
            return to_route('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        return Inertia::render('Coaches/Show', [
            'coach' => $coach,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coach $coach)
    {
        // dd($request->hasFile('photo'));
        // dd($request);
        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'photo' => $request->input('photo'),
                'password' => $request->input('password'),
                'country' => $request->input('country'),
                'phone' => $request->input('phone'),
                'experience' => $request->input('experience'),
                'specialization' => $request->input('specialization'),
                'story' => $request->input('story'),
            ];
            $data['password'] = Hash::make($request->input('password'));

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoPath = $photo->store('public/coaches_photos');
                $data['photo'] = str_replace('public/', '', $photoPath);
            }
            $coach->update($data);

            $coachId = auth()->user()->id;
            $user = User::whereIn('id', [$coachId])
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' =>  $data['password'],
                ]);
            return Inertia::render('Coaches/Index', [
                'coach' => $coach,
            ]);
        } catch (\Throwable $th) {
            return to_route('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destory(Coach $coach)
    {
        //
    }
}
