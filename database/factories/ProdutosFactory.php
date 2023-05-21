<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $caminho = storage_path('app/public/imagens');
        return [
            'nome' => fake()->name(),
            'preco' => fake()->preco(),
            'categoria_id' =>
            Categoria::orderByRaw('RANDOM()')
                ->take(1)
                ->first()
                ->id,
            'fornecedor_id' =>
            Fornecedor::orderByRaw('RANDOM()')
                ->take(1)
                ->first()
                ->id,
            'img' => fake()->image($caminho, 640, 480, null, false, true),
        ];
    }
}