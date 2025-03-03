@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="grid grid-cols-12 gap-4">
        
        <!-- Content -->
        <div class="col-span-9 bg-white p-6 shadow-md rounded-lg">
            <h1 class="text-xl font-bold text-gray-700">SURAT KETERANGAN BELUM MENIKAH</h1>
            
            <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                <h2 class="font-semibold text-lg">DESKRIPSI</h2>
                <p class="text-gray-700 mt-2">Surat Keterangan Belum Menikah adalah surat yang menerangkan bahwa seseorang belum pernah menikah alias berstatus lajang. Surat ini biasanya digunakan sebagai syarat melamar pekerjaan, mengurus pernikahan, pengajuan beasiswa, dan lain sebagainya.</p>
                <p class="text-gray-700 mt-2"><strong>Output:</strong> Dokumen Surat Keterangan Belum Menikah</p>
                <p class="text-gray-700"><strong>Masa Berlaku:</strong> 5 Tahun</p>
            </div>

            <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                <h2 class="font-semibold text-lg">PERSYARATAN</h2>
                <ul class="list-decimal list-inside text-gray-700 mt-2">
                    <li>Fotokopi KTP</li>
                    <li>Fotokopi Kartu Keluarga</li>
                    <li>Surat pengantar dari RT/RW</li>
                    <li>Pas Foto 3x4</li>
                    <li>Formulir Permohonan</li>
                </ul>
            </div>
            
            <button class="mt-4 w-full bg-yellow-500 text-white p-3 rounded-lg">Daftar Perizinan</button>
        </div>
    </div>
</div>
@endsection
