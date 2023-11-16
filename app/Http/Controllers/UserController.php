<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['users'] = User::all();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Buat Pengguna';
        $data['roles'] = User::ROLES;
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $user                       = new User();
            $user->name                 = $request->name;
            $user->email                = $request->email;
            $user->password             = bcrypt($request->password);
            $user->role                 = $request->role;
            $user->email_verified_at    = now();
            $user->save();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('user.create')->withInput()->withToastError("Ups! Gagal Tambah Pengguna!" . $th->getMessage());
        }
        return redirect()->route('user.index')->withToastSuccess("Tambah Pengguna Berhasil!");
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
    public function edit(User $user)
    {
        $title = 'Ubah Pengguna';
        $roles = User::ROLES;
        return view('user.edit', compact('user', 'title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            $user->name                 = $request->name;
            $user->email                = $request->email;
            $user->password             = bcrypt($request->password);
            $user->role                 = $request->role;
            $user->save();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('user.edit', ['user' => $user->getKey()])->withToastError('Eror Ubah Pengguna! ', $th->getMessage());
        }
        return redirect()->route('user.index')->withToastSuccess('Berhasil Ubah Pengguna!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            
            if($user->getKey() === auth()->user()->id){
                throw new \Exception('Tidak dapat hapus akun sendiri!');
            }

            $user->delete();
            DB::commit();

            return redirect()->route('user.index')->withToastSuccess('Berhasil Hapus Pengguna!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('user.index')->withToastSuccess('Gagal Ubah Pengguna!');
        } 
    }
    
    public function viewResetPassword(User $user){
        $title = 'Reset Password Pengguna';
        return view('user.view_reset-password', compact('user', 'title',));
    }

    public function storeResetPassword(Request $request, User $user){
        
        DB::beginTransaction();
        try {

            $request->validate([
                'password' => 'required|string|min:8|confirmed'
            ]);

            if($request->input('password') !== $request->input('password_confirmation')){   
                DB::rollBack();
                return redirect()->route('viewResetPassword', ['user' => $user->getKey()])->withToastError('Eror Ganti Password! Password tidak sama');
            }

            $user->password             = bcrypt($request->password);
            $user->save();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('viewResetPassword', ['user' => $user->getKey()])->withToastError('Eror Ganti Password! ', $th->getMessage());
        }
        return redirect()->route('user.index')->withToastSuccess('Berhasil Ganti Password!');
    }
}
