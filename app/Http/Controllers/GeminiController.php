<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\AIPlatform as VertexAIService;

class GeminiController extends Controller
{
    public function ask(Request $request)
    {
        try {
            $message = $request->input('message');
            
            // Validasi input
            if (empty($message)) {
                return response()->json(['reply' => 'Silakan masukkan pertanyaan Anda']);
            }
            
            // Inisialisasi client Gemini
            $client = new GoogleClient();
            $client->setAuthConfig(config('services.google.application_credentials'));
            $client->addScope('https://www.googleapis.com/auth/cloud-platform');
            
            $service = new VertexAIService($client);
            
            // Siapkan konten teks
            $contents = [
                'contents' => [
                    'parts' => [
                        ['text' => $message]
                    ]
                ]
            ];
            
            // Kirim ke Gemini API (model text-only)
            $projectId = config('services.google.project_id');
            $location = 'us-central1';
            $modelId = 'gemini-pro'; // Model khusus teks
            
            $name = "projects/{$projectId}/locations/{$location}/publishers/google/models/{$modelId}";
            
            $response = $service->projects_locations_publishers_models->generateContent($name, $contents);
            
            // Ambil teks respons
            $reply = '';
            foreach ($response->getCandidates() as $candidate) {
                foreach ($candidate->getContent()->getParts() as $part) {
                    $reply .= $part->getText();
                }
            }
            
            return response()->json(['reply' => $reply]);
            
        } catch (\Exception $e) {
            \Log::error('Gemini API Error: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Maaf, terjadi kesalahan. Silakan coba lagi.',
                'error' => $e->getMessage() // Hanya untuk development
            ], 500);
        }
    }
}