<?php

namespace App\Livewire;

use App\Models\Mobil;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $nopolisi, $merk, $jenis, $kapasitas, $harga, $foto, $id;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'foto' => 'required|image'
        ], [
            'nopolisi.required' => 'Nomor polisi tidak boleh kosong',
            'merk.required' => 'Brand tidak boleh kosong',
            'jenis.required' => 'Jenis harus dipilih',
            'harga.required' => 'Harga tidak boleh kosong',
            'foto.required' => 'Foto harus diisi'
        ]);

        $this->foto->storeAs('mobil', $this->foto->hashName(), 'public');
        Mobil::create([
            'user_id' => Auth::id(),
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'foto' => $this->foto->hashName()
        ]);
        session()->flash('success', 'Data berhasil disimpan');
        $this->reset();
    }

    public function edit($id)
    {
        $this->editPage = true;
        $this->id = $id;
        $mobil = Mobil::find($id);
        $this->nopolisi = $mobil->nopolisi;
        $this->merk = $mobil->merk;
        $this->jenis = $mobil->jenis;
        $this->harga = $mobil->harga;
    }

    public function update()
    {
        $mobil = Mobil::find($this->id);
        if(empty($this->foto)) {
            $mobil->update([
                'user_id' => Auth::id(),
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga
            ]);
        } else {
            unlink(public_path('storage/mobil/' . $mobil->foto));
            $this->foto->storeAs('mobil', $this->foto->hashName(), 'public');
            $mobil->update([
                'user_id' => Auth::id(),
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga,
                'foto' => $this->foto->hashName()
        ]);
        }
        session()->flash('success', 'Berhasil diubah');
        $this->reset();
    }

    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        unlink(public_path('storage/mobil/' . $mobil->foto));
        $mobil->delete();
        session()->flash('success', 'Berhasil dihapus');
        $this->reset();
    }


}
