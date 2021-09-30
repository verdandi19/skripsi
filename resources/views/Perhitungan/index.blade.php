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
                    <p class="font-semibold text-gray-800 leading-tight mb-6">
                        {{ __('Perhitungan Support') }}
                    </p>
                    <div id="panel-support" class="mb-6">
                        <p class="text-center">Data Belum Ada</p>
                    </div>
                    <p class="font-semibold text-gray-800 leading-tight mb-6">
                        {{ __('Perhitungan Confidence') }}
                    </p>
                    <div id="panel_confidence">
                        <p class="text-center">Data Belum Ada</p>
                    </div>

                    <p class="font-semibold text-gray-800 leading-tight mb-6">
                        {{ __('Data Asosiasi') }}
                    </p>
                    <div id="panel_association">
                        <p class="text-center">Data Belum Ada</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @section('moreJs')
        <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
        <script type="text/javascript">

            function elHeaderSupport(key, value) {
                return '<p class="font-semibold text-gray-800 leading-tight" style="font-weight: bold; font-size: 20px;">Kombinasi Item Set ' + value['item_set'] + '<p>' +
                    '<table border="1" style="width: 100%; margin-bottom: 20px;">' +
                    '<tr  id="head-support-' + key + '">' +
                    '<th>Kombinasi Item</th>' +
                    '<th>Kalkulasi</th>' +
                    '<th>Support</th>' +
                    '</tr>' +
                    '</table>';
            }

            function elBodySupport(key, value, transaction) {
                const {title, support, count} = value;
                return '<tr>' +
                    '<td>' + title + '</td>' +
                    '<td class="text-right">(' + count + '/' + transaction + ')</td>' +
                    '<td class="text-right">' + support + '%</td>' +
                    '</tr>';
            }

            function elHeaderConfidence() {
                return '<table border="1" style="width: 100%; margin-bottom: 20px;">\n' +
                    '                            <tr id="head-confidence">\n' +
                    '                                <th>Kombinasi Item</th>\n' +
                    '                                <th>Support</th>\n' +
                    '                                <th>Confidence</th>\n' +
                    '                                <th>Keterangan</th>\n' +
                    '                            </tr>\n' +
                    '                        </table>';
            }

            function elBodyConfidence(key, value, transaction) {
                const {title, support, count, confidence} = value;
                let minConfidence = $('#confidence').val();
                let keterangan = confidence >= minConfidence ? 'Lolos' : 'Tidak Lolos';
                return '<tr>' +
                    '<td>' + title + '</td>' +
                    '<td class="text-right">' + support + '%</td>' +
                    '<td class="text-right">' + confidence + '%</td>' +
                    '<td class="text-right">' + keterangan + '</td>' +
                    '</tr>';
            }

            function elHeaderAssociation() {
                return '<table border="1" style="width: 100%; margin-bottom: 20px;">\n' +
                    '                            <tr id="head-association">\n' +
                    '                                <th>Kombinasi Item</th>\n' +
                    '                                <th>Support</th>\n' +
                    '                                <th>Confidence</th>\n' +
                    '                                <th>Benchamark</th>\n' +
                    '                                <th>Uji Lift</th>\n' +
                    '                                <th>Korelasi</th>\n' +
                    '                            </tr>\n' +
                    '                        </table>';
            }

            function elBodyAssociation(key, value, transaction) {
                const {title, support, benchmark, confidence, lift_ratio, correlation} = value;
                return '<tr>' +
                    '<td>' + title + '</td>' +
                    '<td class="text-right">' + support + '%</td>' +
                    '<td class="text-right">' + confidence + '%</td>' +
                    '<td class="text-right">' + benchmark + '</td>' +
                    '<td class="text-right">' + lift_ratio + '</td>' +
                    '<td class="text-center">' + correlation + '</td>' +
                    '</tr>';
            }
            async function getHasil() {
                try {
                    let awal = $('#tanggal-awal').val();
                    let akhir = $('#tanggal-akhir').val();
                    let support = $('#support').val();
                    let confidence = $('#confidence').val();
                    let response = await $.get('/mapping2?awal=' + awal + '&akhir=' + akhir + '&support=' + support + '&confidence=' + confidence);
                    if (response['code'] === 200) {
                        let panel_support = $('#panel-support');
                        panel_support.empty();
                        let data_support = response['data_support'];
                        let transaction = response['transaction'];
                        $.each(data_support, function (k, v) {
                            panel_support.append(elHeaderSupport(k, v));
                            let el_header_support = $('#head-support-' + k);
                            let el_body_support = '';
                            $.each(v['data'], function (k_data, v_data) {
                                el_body_support += elBodySupport(k_data, v_data, transaction);
                            });
                            el_header_support.after(el_body_support);
                        });

                        let panel_confidence = $('#panel_confidence');
                        panel_confidence.empty();
                        let data_confidence = response['data_confidence'];
                        panel_confidence.append(elHeaderConfidence());
                        let el_header_confidence = $('#head-confidence');
                        let el_body_confidence = '';
                        $.each(data_confidence, function (k, v) {
                            el_body_confidence += elBodyConfidence(k, v, transaction);
                        });
                        el_header_confidence.after(el_body_confidence);

                        let panel_association = $('#panel_association');
                        panel_association.empty();
                        let data_association = response['data_association'];
                        if(data_association.length > 0) {
                            panel_association.append(elHeaderAssociation());
                            let el_header_association = $('#head-association');
                            let el_body_association = '';
                            $.each(data_association, function (k, v) {
                                el_body_association += elBodyAssociation(k, v, transaction);
                            });
                            el_header_association.after(el_body_association);
                        }else {
                            panel_association.append('<p class="text-center">Tidak Ada Asosiasi Yang Tepat</p>');
                        }


                    }
                    console.log(response)
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
