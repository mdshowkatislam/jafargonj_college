<?php

namespace Database\Seeders;

use DB;
use App\Models\CitizenCharter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitizenCharterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Clear existing data
        CitizenCharter::truncate();

        // Upload demo PDF files
        $this->uploadPDF('Sample Document 1', 'sample1.pdf');
        $this->uploadPDF('Sample Document 2', 'sample2.pdf');
        // Add more documents as needed
    }

    private function uploadPDF($title, $fileName)
    {
        $file = storage_path("app/public/pdf/{$fileName}");

        // Move the file to the storage
        Storage::disk('public')->put('pdf/' . $fileName, file_get_contents($file));

        // Create a new document record
        CitizenCharter::create([
            'title' => $title,
            'file_path' => 'pdf/' . $fileName,
        ]);
    }
}
