<?php

namespace Database\Factories;

use App\Models\Pergunta;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerguntaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pergunta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pergunta' => $this->faker->word,
        'resposta_a' => $this->faker->word,
        'resposta_certa_a' => $this->faker->word,
        'resposta_b' => $this->faker->word,
        'resposta_certa_b' => $this->faker->word,
        'resposta_c' => $this->faker->word,
        'resposta_certa_c' => $this->faker->word,
        'resposta_d' => $this->faker->word,
        'resposta_certa_d' => $this->faker->word,
        'quiz_id' => $this->faker->word,
        'pontos' => $this->faker->randomDigitNotNull,
        'data_criacao' => $this->faker->date('Y-m-d H:i:s'),
        'data_atualizacao' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
