<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utenti = User::with('role')->get();
        return view('listautentiadmin', ['utenti' => $utenti]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creautenteadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role_id = $validatedData['role_id'];
        $user->save();

        return redirect()->route('user.index')->with('success', 'Utente creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $utente = $user->load('role');
        return view('dettaglioutenteadmin', compact('utente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Roles::all();
        return view('modificautenteadmin', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->route('user.show', $user->id)->with('success', 'Utente aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role_id == 1) {
            $adminCount = User::where('role_id', 1)->count();
            if($adminCount == 1){
               return redirect()->route('user.index')->with('warning', 'Impossibile cancellare l\'ultimo admin. Assicurarsi di avere almeno un utente con il ruolo di admin'); 
            } else {
                $user->delete();
            return redirect()->route('user.index')->with('success', 'Utente eliminato con successo');
            }
        } else {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Utente eliminato con successo');
        }
    }
}
