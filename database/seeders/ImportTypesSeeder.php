<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImportTypesSeeder extends Seeder
{
    /**
     * Recoge la información del json alojado el storages para coger cada objeto
     * del mismo y guardarlo como type en la base de datos.
     * @return void
     */
    public function run()
    {
        $filePath = Storage::path('yorha.types.json');
        $jsonData = file_get_contents($filePath);
        $items = json_decode($jsonData, true);

        foreach ($items as $item) {
            Types::create([
                'name' => $item['name'],
                'resume' => $item['resume'],
                'desc' => $item['desc'],
            ]);
        }
    }
}
