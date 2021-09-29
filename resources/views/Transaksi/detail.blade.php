<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <div class="col-xl-2">
                    No. Transaksi :  {{ $item->no_transaksi }}
                </div>
                <div class="col-xl-2">
                    Tanggal Transaksi :  {{ $item->tgl_transaksi }}
                </div>
            </div>
            <br>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6  py-4">#</th>
                        <th class="border px-6  py-4">Nama Produk</th>
                        <th class="border px-6  py-4">qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($item->cart as $i)
                        <tr>
                            <td class="border px-6 py-4">{{ $i->id }}</td>
                            <td class="border px-6 py-4">{{ $i->barang->nama }}</td>
                            <td class="border px-6 py-4">{{ $i->qty }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border text-center p-5">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
