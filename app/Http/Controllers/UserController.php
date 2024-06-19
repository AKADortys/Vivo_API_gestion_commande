<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Afficher tous les utilisateurs
    public function index()
    {
        return response()->json(User::all());
    }

    // Créer un nouvel utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'string|max:10',
            'newsletter' => 'boolean',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'newsletter' => $request->has('newsletter') ? 'on' : 'off',
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    // Afficher un utilisateur spécifique
    public function show($id)
    {
        return response()->json(User::find($id));
    }

    // Mettre à jour un utilisateur
    public function update(Request $request)
    {
        try {
             $request->validate([
                'id' => 'required|integer|exists:users,id',
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $request->id,
                'phone' => 'sometimes|required|string|max:10',
                'newsletter' => 'string|max:4',
                'password' => 'nullable|string|min:8',
                'Cpassword' => 'nullable|string|min:8|same:password',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Erreur de validation.', 'messages' => $e->errors()], 422);
        }
    
        try {
            $user = User::findOrFail($request->id);
    
            // Mettre à jour les champs sauf le mot de passe et la newsletter
            $user->update($request->except(['password']));
    
            // Mettre à jour le mot de passe s'il est fourni
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
    
            // Mettre à jour la newsletter
            $user->newsletter = $request->has('newsletter') ? 'on' : 'off';
    
            $user->save();
    
            return redirect('/dashboard');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour de l\'utilisateur.'], 500);
        }
    }
        
    // Supprimer un utilisateur
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }

    // Afficher le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Enregistrer un nouvel utilisateur
    public function register(Request $request)
    {
        // dd($request->all());
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Optionnel: Connexion automatique de l'utilisateur après l'inscription
        // Auth::login($user);

        return redirect('/')->with('success', 'Registration successful!');
    }

    // Valider les données du formulaire
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:12'],
            'newsletter' => ['string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);
    }

    // Créer un nouvel utilisateur
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'newsletter' => isset($data['newsletter']) ? 'on' : 'off',
            'password' => Hash::make($data['password']),
        ]);
    }
}
