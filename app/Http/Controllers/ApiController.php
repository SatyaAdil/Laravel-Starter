<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getApiData()
    {
        try {
            $response = Http::get('https://wilayah.id/api/provinces.json');
            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data dari API.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}