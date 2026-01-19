<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\InfluencerCampain;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfluencerCampainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InfluencerCampain::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 'single',
            'title' => $this->faker->sentence(10),
            'parent_ref_code' => $this->faker->unique->text(255),
            'thumb_img' => $this->faker->text(),
            'note' => $this->faker->text(),
            'total_viewed' => $this->faker->randomNumber(0),
            'cam_full_url' => $this->faker->text(),
            'cam_short_uri' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
            'created_by' => \App\Models\User::factory(),
        ];
    }
}
