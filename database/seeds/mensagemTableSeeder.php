<?php

use Illuminate\Database\Seeder;
use App\Mensagem;

class mensagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensagem::create([
            "titulo" => "Minha mensagem 1",
            "texto" => "meu texto da mensagem",
            "autor" => "Iuri",
            'user_id' => 1,
            'atividade_id' => 1
        ]);
        Mensagem::create([
            "titulo" => "Minha mensagem 2",
            "texto" => "mensagem",
            "autor" => "Iuri",
            'user_id' => 1,
            'atividade_id' => 1
        ]);

        Mensagem::create([
            "titulo" => "Teste",
            "texto" => "apenas testando ",
            "autor" => "Iuri",
            'user_id' => 1,
            'atividade_id' => 2
        ]);

        factory('App\Mensagem', 10)->create();
    }
}
