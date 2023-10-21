<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outlet>
 */
class OutletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'business_name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'show_tax_note' => $this->faker->boolean,
            'tax_amount' => $this->faker->randomFloat(2, 0, 100),
            'taxpayer_name' => $this->faker->name,
            'taxpayer_address' => $this->faker->address,
            'nopd' => $this->faker->numberBetween(100000000000000000, 999999999999999999),
            'npwpd' => $this->faker->numberBetween(100000000000000, 999999999999999),
            'id_business_category' => $this->faker->numberBetween(1,5),
            'opening_hours' => $this->faker->randomElement([
                'Monday - Sunday, 09:00 AM - 09:00 PM',
                'Monday - Sunday, 08:00 AM - 08:00 PM',
                'Monday - Sunday, 10:00 AM - 10:00 PM',
            ]),
            'print_memo' => $this->faker->boolean,
            'print_kitchen_memo' => $this->faker->boolean,
            'active_until' => $this->faker->dateTimeBetween('now', '+2 years')->format('Y-m-d'),
            
        ];
    }
}
