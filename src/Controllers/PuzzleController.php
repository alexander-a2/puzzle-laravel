<?php

namespace AlexanderA2\PuzzleLaravel\Controllers;

use AlexanderA2\PuzzleLaravel\Services\PuzzleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class PuzzleController
{
    public function index()
    {
        $puzzleService = $this->getPuzzleService();

        if (request()->isMethod('post')) {
            $puzzleService->savePuzzleData(request()->all());

            return redirect('/puzzle');
        }

        return view('puzzle::puzzle', [
            'data' => $puzzleService->getPuzzleData(),
            'images' => $puzzleService->getAvailableImages(),
        ]);
    }

    public function showImage($imageDir, $imageName)
    {
        $puzzleService = new PuzzleService(
            sprintf('%s/tests/flow.json', base_path()),
            sprintf('%s/tests/playwright/snapshots', base_path()),
        );
        $path = $puzzleService->getImagePath($imageDir . '/' . $imageName);
        $type = File::mimeType($path);
        $file = fopen($path, 'rb');

        if ($file === false) {
            abort(500, 'Unable to open file for reading');
        }
        $headers = [
            'Content-Type' => $type,
            'Content-Length' => filesize($path),
        ];

        // Return the response with a callback to stream the file
        return response()->stream(function () use ($file) {
            while (!feof($file)) {
                // Read and output a chunk of the file
                echo fread($file, 1024 * 8); // Reading in 8KB chunks
                ob_flush(); // Flush the output buffer
                flush();    // Flush the system output buffer
            }
            fclose($file); // Close the file after reading
        }, 200, $headers);
    }

    public function getPuzzleService(): PuzzleService
    {
        return new PuzzleService(
            sprintf('%s/tests/flow.json', base_path()),
            sprintf('%s/tests/Playwright/snapshots', base_path()),
        );
    }
}