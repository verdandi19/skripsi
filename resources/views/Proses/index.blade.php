<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Proses') }}
        </h2>
    </x-slot>

<div class="super_sub_content">
    <div class="container">
        <div class="row">
            <?php
            $can_process = true;
            if (empty($_POST['min_support']) || empty($_POST['min_confidence'])) {
                $can_process = false;
                ?>
                <script> location.replace("?menu=Data Proses&pesan_errpr=Min Support dan Min Confidence Harus Diisi")
            }

</x-app-layout>