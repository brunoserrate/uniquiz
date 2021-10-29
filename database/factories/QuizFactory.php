<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
        'descricao' => $this->faker->word,
        'categoria_id' => $this->faker->randomDigitNotNull,
        'data_criacao' => $this->faker->date('Y-m-d H:i:s'),
        'data_atualizacao' => $this->faker->date('Y-m-d H:i:s'),
        'usuario_id' => $this->faker->word
        ];
    }
}
