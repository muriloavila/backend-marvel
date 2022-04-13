<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producao;

class ProducaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producao::truncate();

        $file_handle = fopen('./MCU.csv', 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, ',');
            
        }
        fclose($file_handle);
        
        foreach ($line_of_text as $key => $value) {
            if($key == 0 || !is_array($value)) continue;

            $tipo = trim($value[3]) == 'Film' ? 1 : 2;
            
            Producao::create([
                'name' => $value[0],
                'tipo' => $tipo,
                'data_lancamento' => trim($value[1]),
                'fase' => intval(trim($value[2])),
                'link_picture' => '',
                'descricao' => ''
            ]);
        }
    }
}
