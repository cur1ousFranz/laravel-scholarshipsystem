<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Contact;
use App\Models\Applicant;
use App\Models\ApplicantList;
use App\Models\DynamicAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $applicant = Applicant::factory()->create();
        Contact::factory()->create([
            'applicants_id' => $applicant
        ]);

        ApplicantList::factory()->create([
            'applicants_id' => $applicant
        ]);

        School::factory()->create([
            'applicants_id' => $applicant
        ]);

        $address = DynamicAddress::all();
        $index = rand(0, 225);
        return [
            'applicants_id' => $applicant,
            'country' => $address[$index]->country,
            'province' => $address[$index]->province,
            'city' => $address[$index]->city,
            'barangay' => $address[$index]->barangay,
            'street' => $this->faker->sentence(),
            'region' => rand(1,12),
            'zipcode' => $this->faker->postcode(),
            'created_at' => now(),

        ];
    }
}
