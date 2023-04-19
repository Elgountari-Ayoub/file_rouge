<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Coach;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Inertia::render('Clients/CoachesList');
        $user = Auth::user();
        if ($user->role != 'client') {
            return to_route('/');
        }
        $clientId = auth()->user()->id;
        $client = Client::where('user_id', $clientId)->first();
        // dd($client->id);   
        // dd(12);
        return Inertia::render('Clients/Index', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        if ($user->role == 'client') {
            $this->index();
            return;
        }
        return Inertia::render('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image',
            'gender' => 'required|string|max:255',
            'height' => 'required|integer|max:255',
            'weight' => 'required|integer|max:255',
            'goal' => 'required|string|max:255',
            'birthday' => 'required|date',
        ]);
        $user = auth()->user();

        $client = new Client();

        $client->user_id = $user->id;
        $client->name    = $user->name;
        $client->email = $user->email;
        $client->password = $user->password;
        $client->photo = $validatedData['photo'];
        $client->gender = $validatedData['gender'];
        $client->height = $validatedData['height'];
        $client->weight = $validatedData['weight'];
        $client->goal = $validatedData['goal'];
        $client->birthday = $validatedData['birthday'];

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('public/clientes_photos');
            $client->photo = str_replace('public/', '', $photoPath);
        }
        // dd($client);
        $client->save();

        $clientId = auth()->user()->id;
        $user = User::whereIn('id', [$clientId])
            ->update(['role' => 'client']);

        return to_route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'photo' => $request->input('photo'),
                'gender' => $request->input('gender'),
                'height' => $request->input('height'),
                'weight' => $request->input('weight'),
                'goal' => $request->input('goal'),
                'birthday' => $request->input('birthday'),
            ];
            $data['password'] = Hash::make($request->input('password'));

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoPath = $photo->store('public/clientes_photos');
                $data['photo'] = str_replace('public/', '', $photoPath);
            }
            // $client->update($data);  
            $client->update($data);

            $clientId = auth()->user()->id;
            $user = User::whereIn('id', [$clientId])
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' =>  $data['password'],
                ]);
            return Inertia::render('Clients/Index', [
                'client' => $client,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }

    public function coaches()
    {
        // get all the coaches
        return view('songs.index', [
            'songs' => Coach::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    
}
