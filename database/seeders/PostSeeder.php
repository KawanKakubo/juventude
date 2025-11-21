<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Chegada a Lisboa - Primeiro Dia',
            'description' => 'Iniciamos nossa jornada em Portugal! Chegamos a Lisboa no início da tarde e fomos recebidos com um clima maravilhoso. Visitamos o centro histórico e conhecemos um pouco da rica cultura portuguesa. Os estudantes estão muito animados e empolgados com as experiências que virão!',
            'post_date' => Carbon::now()->subDays(5),
            'published' => true,
        ]);

        Post::create([
            'title' => 'Visita ao Porto Tech Hub',
            'description' => 'Hoje foi dia de conhecer o incrível Porto Tech Hub! Os jovens tiveram a oportunidade de participar de workshops sobre inovação e tecnologia, além de interagir com startups locais. Foi uma experiência enriquecedora que abriu muitas portas para o futuro. A energia e criatividade do ambiente inspiraram todos nós!',
            'post_date' => Carbon::now()->subDays(3),
            'published' => true,
        ]);

        Post::create([
            'title' => 'Conhecendo Aveiro - A Veneza Portuguesa',
            'description' => 'Um dia maravilhoso em Aveiro! Conhecida como a "Veneza Portuguesa", a cidade nos encantou com seus canais e moliceiros coloridos. Além do passeio cultural, visitamos o Centro de Inovação da Universidade de Aveiro, onde aprendemos sobre projetos de sustentabilidade e desenvolvimento tecnológico. Os ovos moles foram um delicioso bônus!',
            'post_date' => Carbon::now()->subDays(1),
            'published' => true,
        ]);
    }
}
