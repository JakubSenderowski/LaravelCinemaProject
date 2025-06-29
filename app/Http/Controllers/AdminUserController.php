<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.editView', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', "unique:users,email,{$id}"],
            'is_active' => ['required', 'boolean'],
            'password'  => ['nullable', 'min:6', 'regex:/^[A-Z]/', 'regex:/[!@#$%^&*]/'],
            'is_admin' => ['required','boolean'],
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        } else {
            unset($data['password']);
        }

        User::findOrFail($id)->update($data);
        return redirect('/uzytkownicy-zarzadzanie')->with('success', 'Zaktualizowano użytkownica :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();
        return redirect('/uzytkownicy-zarzadzanie')->with('success', 'Użytkownik usunięty. :)');
    }
    public function search(Request $request)
    {
        $query = $request->input('q');
        $users = User::when($query, fn($q) =>
        $q->where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
        )->get();
        return view('admin.users.index', compact('users', 'query'));
    }

}
