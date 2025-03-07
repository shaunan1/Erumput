<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BeritaController extends Controller
{
    public function getBerita()
    {
        // Panggil API dari kedirikota.go.id
        function extractImageUrl($html)
        {
            preg_match('/<img.*?src=["\'](.*?)["\']/', $html, $matches);
            return $matches[1] ?? null; // Ambil URL pertama jika ada
        }
        
        $response = Http::get('https://kedirikota.go.id/api/berita');
        $data = json_decode($response->body(), true);
        
        if (isset($data['berita'])) {
            $berita = json_decode($data['berita'], true); // Decode JSON string
            foreach ($berita as &$item) {
                $item['gambar'] = extractImageUrl($item['deskripsi']); // Ambil gambar pertama
                $item['deskripsi'] = strip_tags($item['deskripsi']); // Bersihkan HTML
            }
        } else {
            return response()->json(['error' => 'Data berita tidak ditemukan'], 500);
        }
        
        return view('warga', compact('berita'));
        

        // Jika gagal, tampilkan pesan error
        return response()->json(['error' => 'Gagal mengambil data berita'], 500);
    }
} 
