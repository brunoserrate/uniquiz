<?php

namespace Database\Factories;

use App\Models\Ranking;
use Illuminate\Database\Eloquent\Factories\Factory;

class RankingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ranking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pontuacao' => $this->faker->randomDigitNotNull,
        'tentativas' => $this->faker->randomDigitNotNull,
        'data_criacao' => $this->faker->date('Y-m-d H:i:s'),
        'data_atualizacao' => $this->faker->date('Y-m-d H:i:s'),
        'usuario_id' => $this->faker->word
        ];
    }
}
