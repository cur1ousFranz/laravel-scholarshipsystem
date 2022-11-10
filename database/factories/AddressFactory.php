<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Contact;
use App\Models\Applicant;
use App\Models\RatingReport;
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

        $passed = false;

        //Matching algorithm
        if($applicant->educational_attainment == "Yes"
        && $applicant->nationality == "Yes"
        && $applicant->registered_voter == "Yes"){

            $passed = true;
        }

        // STAGE 2
        if($passed) {

            $rating = 0;
            switch($applicant->family_income){

                case "Less than ₱10,957" : $rating += 50; break;
                case "₱10,957 to ₱21,194" : $rating += 42; break;
                case "₱21,194 to ₱43,828" : $rating += 35; break;
                case "₱43,828 to ₱76,669" : $rating += 28; break;
                case "₱76,669 to ₱131,484" : $rating += 21; break;
                case "₱131,484 to ₱219,140" : $rating += 14; break;
                case "₱219,140 and above" : $rating += 7; break;
            }

            switch(true){

                case ($applicant->gwa >= 80): $rating += 35; break;
                case ($applicant->gwa < 80 && $applicant->gwa >= 75)
                : $rating += 17; break;
                case ($applicant->gwa < 75) : $rating += 8; break;
            }

            switch($applicant->years_in_city){

                case 1 : $rating += 3; break;
                case 2 : $rating += 7; break;
                case 3 : $rating += 15; break;
            }

            $applicantList = ApplicantList::factory()->create([
                'applicants_id' => $applicant,
                'created_at' => date("2021-m-d H:i:s") //change this
            ]);

            $applicantList->rating()->create([
                'rate' => $rating
            ]);

        } else {

            $applicantList = ApplicantList::factory()->create([
                'applicants_id' =>  $applicant,
                'review' => 'Yes',
                'created_at' => date("2015-m-d H:i:s") //change this
            ]);

            $applicantList->rating()->create([
                'rate' => 0
            ]);

            $applicantList->rejectedApplicant()->create([
                'applications_id' => $applicantList->applications_id,
                'applicants_id' =>  $applicant->id,
                'document' => '',
                'added' => "System"
            ]);

        }

        School::factory()->create([
            'applicants_id' => $applicant
        ]);

        $address = DynamicAddress::all();
        $index = rand(0, 225);
        return [
            'applicants_id' => $applicant,
            'country' => $address[$index]->country,
            'province' => $address[$index]->province,
            // 'city' => $address[$index]->city,
            'city' => 'General Santos',
            'barangay' => $address[$index]->barangay,
            'street' => $this->faker->sentence(),
            'region' => 12,
            'zipcode' => $this->faker->postcode(),
            'created_at' => now(),

        ];
    }
}
