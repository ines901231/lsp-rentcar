<?php

namespace App\Livewire;

use App\Models\Mobil;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;

/**
 * Komponen untuk mengelola transaksi pemesanan mobil.
 */
class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $addPage, $lihatPage = false;
    public $nama, $ponsel, $alamat, $lama, $tgl_pesan, $mobil_id, $harga, $total;

    /**
     * Render daftar mobil untuk disewa.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $data['mobil'] = Mobil::paginate(5);
        return view('livewire.transaksi-component', $data);
    }

    /**
     *  Membuka halaman tambah transaksi.
     */
    public function create($id, $harga)
    {
        $this->mobil_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }

    /**
     * Menghitung total biaya (harga*hari).
     */
    public function hitung()
    {
        $lama = $this->lama;
        $harga = $this->harga;
        $this->total = $lama*$harga;
    }

    /**
     * Membuat data transaksi baru.
     */
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required',
            'tgl_pesan' => 'required'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'ponsel.required' => 'Nomor HP tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'lama.required' => 'Durasi sewa tidak boleh kosong',
            'tgl_pesan.required' => 'Tanggal harus diisi',
        ]);
        $cari = Transaksi::where('mobil_id', $this->mobil_id)->where('tgl_pesan', $this->tgl_pesan)->where('status', '!=', 'selesai')->count();
        if ($cari == 1) {
            session()->flash('error', 'Sudah ada yang memesan mobil ini di tanggal yang sama');
        } else {
            Transaksi::create([
                'user_id' => Auth::id(),
                'mobil_id' => $this->mobil_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'lama' => $this->lama,
                'alamat' => $this->alamat,
                'tgl_pesan' => $this->tgl_pesan,
                'total' => $this->total,
                'status' => 'wait'
            ]);
            session()->flash('success', 'Transaksi berhasil disimpan');
        }   
        $this->dispatch('lihat-transaksi');
        $this->reset();
    }

    /**
     * Melihat data transaksi.
     */
    public function lihat()
    {
        $this->dataTransaksi['transaksi'] = Transaksi::paginate(10);
        $this->lihatPage = true;
    }
}
