<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

/**
 * Komponen untuk menampilkan laporan transaksi berdasarkan rentang tanggal.
 */
class LaporanComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    /** @var string|null */
    public $tanggal1, $tanggal2;
    /**
     * Render komponen laporan transaksi.
     * @return \Illuminate\View\View
     */
    #[On('lihat-laporan')]
    public function render()
    {
        if($this->tanggal2!="") {
            $data['transaksi'] = Transaksi::where('status', 'selesai')
            ->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])
            ->paginate(10);
        } else {
            $data['transaksi'] = Transaksi::where('status', 'selesai')->paginate(10);
        }
        
        return view('livewire.laporan-component', $data);
    }

    /**
     * Memicu event Livewire untuk memperbarui tampilan laporan.
     */
    public function cari()
    {
        $this->dispatch('lihat-laporan');
    }
}
