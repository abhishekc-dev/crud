<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::all();
        return view('list-user', [
            'users' => $Users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png',
        ]);

        $file = $request->file('file')->store('images', 'public');
        $User = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'image' => $file,
        ]);
        if ($User) {
            return redirect()->route('create.user')->with('status', 'User Added Successfully');
        }

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
        $user = User::find($id);
        if ($user) {
            return view('edit-user', [
                'user' => $user,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png', // Validation for image upload
        ]);

        $user = User::find($id);
        if ($request->hasFile('file')) {

            $path = public_path('storage/') . $user->image;
            if (file_exists($path)) {
                @unlink($path);
            }

            $file = $request->file('file')->store('images', 'public');
            $user->image = $file;
        }
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->mobile = $validatedData['mobile'];
        $user->save();
        return redirect()->route('list.user')->with('status', 'User Updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $file = public_path('storage/') . $user->image;
        if (file_exists($file)) {
            @unlink($file);
        }
        return redirect()->back()->with('status', 'User Deleted Successfully');
    }

}
