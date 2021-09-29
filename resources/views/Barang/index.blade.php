<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="/dashboard/barang/create" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Data
                </a>
            </div>
            <br>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6  py-4">ID</th>
                        <th class="border px-6  py-4">Nama Produk</th>
                        <th class="border px-6  py-4">Kode</th>
                        <th class="border px-6  py-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4">{{ $item->nama }}</td>
                            <td class="border px-6 py-4">{{ $item->code }}</td>
                            <td class="border px-6 py- text-center">
                                <a href="/dashboard/barang/edit/{{ $item->id }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                    Edit
                                </a>
                                <form action="/dashboard/barang/destroy/{{ $item->id }}" method="POST" class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                        Delete
                                    </button>
                                </form>
                            </td>
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
