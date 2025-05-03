<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ApiCBController extends Controller
{
    public function handleRequest(Request $request)
    {
        // Validasi input
        $message = $request->input('message');
        
        if (empty($message)) {
            return response()->json(['reply' => 'Pesan tidak boleh kosong.'], 400);
        }

        $apiKey = env('OP'); // Pastikan ini sudah diset di .env
        if (!$apiKey) {
            return response()->json(['reply' => 'API Key tidak ditemukan.'], 500);
        }

        $client = new Client();

        try {
            // Kirim request ke OpenAI
            $response = $client->post('https://openrouter.ai/api/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => '4.1', // gpt-4 atau gpt-4.0 / gpt-4-turbo kalau mau lebih murah
                    'messages' => [
                        ['role' => 'user', 'content' => $message],
                    ],
                ],
            ]);

            // Ambil hasil dari API
            $responseBody = $response->getBody()->getContents();
            Log::info('OpenAI API Response: ' . $responseBody);

            $data = json_decode($responseBody, true);

            // Ambil isi jawaban
            $reply = $data['choices'][0]['message']['content'] ?? 'Tidak ada balasan yang diterima.';

            return response()->json(['reply' => $reply]);

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('Request Error: ' . $e->getMessage());
            return response()->json(['reply' => 'Gagal menghubungi server AI.'], 500);
        } catch (\Exception $e) {
            Log::error('Unexpected Error: ' . $e->getMessage());
            return response()->json(['reply' => 'Terjadi kesalahan yang tidak terduga.'], 500);
        }
    }
}
