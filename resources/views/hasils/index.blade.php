<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <br>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6  py-4">ID</th>
                        <th class="border px-6  py-4">Tanggal Awal</th>
                        <th class="border px-6  py-4">Tanggal Akhir</th>
                        <th class="border px-6  py-4">Min SUpport</th>
                        <th class="border px-6  py-4">Min Confidence</th>
                        <th class="border px-6  py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($hasil as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4">{{ $item->tanggal_awal }}</td>
                                <td class="border px-6 py-4">{{ $item->tanggal_akhir }}</td>
                                <td class="border px-6 py-4">{{ $item->min_support }}</td>
                                <td class="border px-6 py-4">{{ $item->min_confidence }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('users.edit', $item->id) }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Lihat
                                    </a>
                                    <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Cetak
                                        </button>
                                    
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
            <div class="text-center mt-5">
                {{ $hasil->links() }}
            </div>
        </div>
    </div>
</x-app-layout>