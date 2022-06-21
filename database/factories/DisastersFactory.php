<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disasters>
 */
class DisastersFactory extends Factory
{
    protected $cities = [
        'Kabupaten Bangkalan', 'Kabupaten Banyuwangi', 'Kabupaten Blitar', 'Kabupaten Bojonegoro', 'Kabupaten Bondowoso',
        'Kabupaten Gresik', 'Kabupaten Jember', 'Kabupaten Jombang', 'Kabupaten Kediri', 'Kabupaten Lamongan',
        'Kabupaten Lumajang', 'Kabupaten Madiun', 'Kabupaten Magetan', 'Kabupaten Malang', 'Kabupaten Mojokerto',
        'Kabupaten Nganjuk', 'Kabupaten Ngawi', 'Kabupaten Pacitan', 'Kabupaten Pamekasan', 'Kabupaten Pasuruan',
        'Kabupaten Ponorogo', 'Kabupaten Probolinggo', 'Kabupaten Sampang', 'Kabupaten Sidoarjo', 'Kabupaten Situbondo',
        'Kabupaten Sumenep', 'Kabupaten Trenggalek', 'Kabupaten Tuban', 'Kabupaten Tulungagung', 'Kota Batu',
        'Kota Blitar', 'Kota Kediri', 'Kota Madiun', 'Kota Malang', 'Kota Mojokerto',
        'Kota Pasuruan', 'Kota Probolinggo', 'Kota Surabaya'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'postal_code' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'description' => $this->faker->text(),
            'city' => $this->faker->randomElement($this->cities),
            'latitude' => $this->faker->latitude(-8.575589, -6.863712),
            'longitude' => $this->faker->longitude(111.110229, 114.252319),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
