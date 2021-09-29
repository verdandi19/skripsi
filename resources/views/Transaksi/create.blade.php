<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Data Transaksi &raquo; Create') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>

                @if(Session::has('errors'))
                    <p>error</p>
                @endif
{{--                <form class="w-full" action="/dashboard/transaksi/store" method="post" enctype="multipart/form-data">--}}
{{--                <form class="w-full">--}}
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                No. Transaksi
                            </label>
                            <input value="{{ old('no_trans') }}" name="no_trans"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="no_trans" type="text" placeholder="Nama Transaksi">
                            <p class="text-gray-600 text-xs italic">Nomor Transaksi</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Kode Produk
                            </label>
                            <input value="{{ old('tanggal') }}" type="date" name="tanggal"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="tanggal" placeholder="Tanggal">
                            <p class="text-gray-600 text-xs italic"> Tanggal Transaksi</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button id="btn-transaction"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Save Data
                            </button>
                        </div>
                    </div>
{{--                </form>--}}
            </div>
            <div class="bg-white" style="padding: 30px 30px;">
                <h4 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
                    {{ __('Input Keranjang Belanja') }}
                </h4>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Pilih Barang
                        </label>
                        <select id="barang_id"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($barang as $item)
                                <option class="" value="{{$item->id}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Qty
                        </label>
                        <input value="{{ old('qty') }}" name="qty" id="qty"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="qty" type="number" placeholder="Qty">
                        <p class="text-gray-600 text-xs italic"> Qty Barang Yang Di Jual</p>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 text-right">
                        <button id="btn-cart"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Keranjang
                        </button>
                    </div>
                </div>

                <h6 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
                    {{ __('Data Keranjang Belanja') }}
                </h6>

                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6  py-4">#</th>
                        <th class="border px-6  py-4">Nama Barang</th>
                        <th class="border px-6  py-4">Qty</th>
                        <th class="border px-6  py-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @section('moreJs')
        <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
        <script type="text/javascript">

            async function addTransaction() {
                try {
                    let response = await $.post('/dashboard/transaksi/store', {
                        _token: '{{ csrf_token() }}',
                        no_trans: $('#no_trans').val(),
                        tanggal: $('#tanggal').val(),
                    });
                    if(response['code'] === 200) {
                        window.location.href = '/dashboard/transaksi';
                    }else {
                        alert('Tidak Ada Data Keranjang')
                    }
                    console.log(response)
                } catch (e) {
                    alert('Terjadi Kesalahan')
                }

            }

            async function addCart() {
                try {
                    let response = await $.post('/dashboard/transaksi/cart/store', {
                        _token: '{{ csrf_token() }}',
                        barang: $('#barang_id').val(),
                        qty: $('#qty').val(),
                    });
                    await getCart();
                    console.log(response)
                } catch (e) {
                    console.log(e)
                }

            }

            async function getCart() {
                try {
                    let el = $('#table-body');
                    el.empty();
                    let response = await $.get('/dashboard/transaksi/cart');
                    if (response['data'].length > 0) {
                        $.each(response['data'], function (k, v) {
                            el.append(elCart(v, k + 1));
                        })
                        $('.btn-del-cart').on('click', async function (e) {
                            e.preventDefault();
                            let id = this.dataset.id;
                            await deleteCart(id);
                            console.log(id)
                        })
                    } else {
                        el.append(elEmptyCart());
                    }
                    console.log(response)
                } catch (e) {
                    console.log(e)
                }
            }

            async function deleteCart(id) {
                try {
                    let response = await $.post('/dashboard/transaksi/cart/destroy/' + id, {
                        _token: '{{ csrf_token() }}',
                    });
                    console.log(response);
                    await getCart();
                } catch (e) {
                    console.log(e)
                }
            }

            function elCart(value, index) {
                return '<tr>\n' +
                    '<td class="border px-6 py-4">' + index + '</td>\n' +
                    '<td class="border px-6 py-4">' + value['barang']['nama'] + '</td>\n' +
                    '<td class="border px-6 py-4">' + value['qty'] + '</td>\n' +
                    '<td class="border px-6 py- text-center">\n' +
                    '<a data-id="' + value['id'] + '" href="#" class="btn-del-cart inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 mx-2 rounded">\n' +
                    'Hapus\n' +
                    '</a>\n' +
                    '</td>\n' +
                    '</tr>'
            }

            function elEmptyCart() {
                return '<tr>\n' +
                    '                            <td colspan="6" class="border text-center p-5">\n' +
                    '                                Data Tidak Ditemukan\n' +
                    '                            </td>\n' +
                    '                        </tr>'
            }

            $(document).ready(function () {
                getCart();
                $('#btn-cart').on('click', function () {
                    addCart();
                })

                $('#btn-transaction').on('click', function () {
                    addTransaction();
                })


            })
        </script>
    @endsection
</x-app-layout>


