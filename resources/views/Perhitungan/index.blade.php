<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Perhitungan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-50 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-last-name">
                        Tanggal Awal
                    </label>
                    <input value="{{ old('tanggal-awal') }}" type="date" name="tanggal-awal"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="tanggal-awal" placeholder="Tanggal">
                    <p class="text-gray-600 text-xs italic"> Tanggal Transaksi Awal</p>
                </div>
                <div class="w-50 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-last-name">
                        Tanggal Akhir
                    </label>
                    <input value="{{ old('tanggal-akhir') }}" type="date" name="tanggal-akhir"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="tanggal-akhir" placeholder="Tanggal">
                    <p class="text-gray-600 text-xs italic"> Tanggal Transaksi Akhir</p>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-last-name">
                        Support
                    </label>
                    <input value="0" name="support" id="support"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="Support">
                    <p class="text-gray-600 text-xs italic"> Minimal Support</p>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-last-name">
                        Support
                    </label>
                    <input value="0" name="confidence" id="confidence"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="Confidence">
                    <p class="text-gray-600 text-xs italic"> Minimal Confidence</p>
                </div>
                <button id="btn-hitung"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Hitung
                </button>
            </div>
            <br>
            <div class="bg-white" style="padding: 30px 30px;">
                <h4 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
                    {{ __('Data Hasil Perhitungan') }}
                </h4>
                <div id="results">
                    <p class="text-center">Data Belum Ada</p>
                </div>
            </div>
        </div>
    </div>
    @section('moreJs')
        <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
        <script type="text/javascript">
            async function getHasil() {
                try {
                    let awal = $('#tanggal-awal').val();
                    let akhir = $('#tanggal-akhir').val();
                    let support = $('#support').val();
                    let confidence = $('#confidence').val();;
                    let response = await $.get('/mapping2?awal=' + awal + '&akhir=' + akhir + '&support=' + support + '&confidence=' + confidence);
                } catch (e) {
                    console.log(e)
                }

            }

            $(document).ready(function () {
                $('#btn-hitung').on('click', function () {
                    getHasil()
                })
            })
        </script>
    @endsection
</x-app-layout>
