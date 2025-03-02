<br>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add Transaksi</h6>
        <form>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" wire:model="nama" id="nama"
                    aria-describedby="emailHelp">
                @error('nama')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ponsel" class="form-label">Nomor Ponsel</label>
                <input type="text" class="form-control" wire:model="ponsel" id="ponsel" value="{{ @old('ponsel') }}"
                    aria-describedby="emailHelp">
                @error('ponsel')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Pemesan</label>
                <input type="text" class="form-control" wire:model="alamat" id="alamat" value="{{ @old('alamat') }}"
                    aria-describedby="emailHelp">
                @error('alamat')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lama" class="form-label">Durasi sewa (hari)</label>
                <input type="number" class="form-control" wire:change="hitung" wire:model="lama" id="lama" value="{{ @old('lama') }}"
                    aria-describedby="emailHelp">
                @error('lama')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_pesan" class="form-label">Tanggal Pemesanan</label>
                <input type="date" class="form-control" wire:model="tgl_pesan" id="tgl_pesan" value="{{ @old('tgl_pesan') }}"
                    aria-describedby="emailHelp">
                @error('tgl_pesan')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                Total : {{ $total }}
            </div>
            <button type="button" wire:click="store" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
</div>
</div>
