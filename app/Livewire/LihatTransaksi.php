<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

/**
 * Komponen untuk menampilkan daftar transaksi.
 */
class LihatTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;

    /**
     * Render daftar transaksi.
     * @return \Illuminate\View\View
     */
    #[On('lihat-transaksi')]
    public function render()
    {
        $data['transaksi'] = Transaksi::paginate(10);
        return view('livewire.lihat-transaksi', $data);
    }

    /**
     * Mengubah status transaksi menjadi "proses".
     * @param int $id
     */
    public function proses($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'proses'
        ]);
        session()->flash('success', 'Berhasil proses data');
    }

    /**
     * Mengubah status transaksi menjadi "selesai".
     * @param int $id
     */
    public function selesai($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'selesai'
        ]);
        session()->flash('success', 'Berhasil proses data');
    }
}
