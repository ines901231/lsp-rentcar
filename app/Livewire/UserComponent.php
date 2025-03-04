<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Livewire\WithoutUrlPagination;

/**
 * Komponen untuk mengelola data pengguna dalam sistem.
 */
class UserComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $nama, $email, $password, $role, $id;

    /**
     * Render daftar pengguna.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $data['user'] = User::paginate(2);
        return view('livewire.user-component', $data);
    }

    /**
     *  Membuka halaman tambah user.
     */
    public function create()
    {
        $this->reset();
        $this->addPage = true;
    }

    /**
     *  Menyimpan data user baru.
     */
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ], [
            'nama.required' => 'Nama jangan kosonk',
            'email.required' => 'Email jangan kosonk',
            'password.required' => 'Password jangan kosonk',
            'role.required' => 'Role jangan kosonk'
        ]);
        User::create([
            'name' => $this->nama, 
            'email' => $this->email, 
            'password' => Hash::make($this->password), 
            'role' => $this->role
        ]);
        session()->flash('success', 'Data berhasil disimpan');
        $this->reset();
    }

    /**
     *  Menghapus data user.
     */
    public function destroy($id)
    {
        $cari=User::find($id);
        $cari->delete();
        session()->flash('success', 'Berhasil hapus data');
        $this->reset();
    }

    /**
     *  Mengedit data user.
     */
    public function edit($id)
    {
        $this->reset();
        $cari=User::find($id);
        $this->nama = $cari->name;
        $this->email = $cari->email;
        $this->role = $cari->role;
        $this->id = $cari->id;
        $this->editPage = true;
    }

    /**
     *  Mengupdate data user.
     */
    public function update()
    {
        $cari = User::find($this->id);
        if($this->password == "") {
            $cari->update([
                'name' => $this->nama, 
                'email' => $this->email, 
                'role' => $this->role 
            ]);
        } else {
            $cari->update([
                'name' => $this->nama, 
                'email' => $this->email, 
                'password' => Hash::make($this->password), 
                'role' => $this->role 
            ]);
        }
        session()->flash('success', 'Berhasil ubah data');
        $this->reset();
    }
}
