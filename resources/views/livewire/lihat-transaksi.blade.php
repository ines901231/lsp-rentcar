<div>
    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <h6 class="mb-4">Data Transaksi</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No.Polisi</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Ponsel</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Total</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Proses</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksi as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->mobil->nopolisi }}</td>
                        <td>{{ $data->mobil->merk }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->ponsel }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->tgl_pesan }}</td>
                        <td>{{ $data->total }}</td>
                        <td>{{ $data->lama }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            @if ($data->status == "wait")
                                <button class="btn btn-sm btn-success" wire:click="proses({{ $data->id }})">PROSES</button>
                            @endif
                            @if ($data->status == "proses")
                                <button class="btn btn-sm btn-success" wire:click="selesai({{ $data->id }})">SELESAI</button>
                            @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6">Data transaksi belum ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $transaksi->links() }}
        </div>
    </div>
</div>
</div>
</div>
