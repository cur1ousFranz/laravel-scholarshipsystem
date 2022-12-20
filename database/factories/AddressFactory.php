<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Contact;
use App\Models\Applicant;
use App\Models\RatingReport;
use App\Models\ApplicantList;
use App\Models\DynamicAddress;
use Illuminate\Support\Facades\DB;
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

        $family_incomes = DB::table('family_incomes')->first();
        $range = json_decode($family_incomes->range, true);
        $rating = 0;

        switch($applicant->family_income){

            case $range['bracket1'] : $rating += 50; break;
            case $range['bracket2'] : $rating += 42; break;
            case $range['bracket3'] : $rating += 35; break;
            case $range['bracket4'] : $rating += 28; break;
            case $range['bracket5'] : $rating += 21; break;
            case $range['bracket6'] : $rating += 14; break;
            case $range['bracket7'] : $rating += 7; break;
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

        if($rating >= 75){

            $applicantList = ApplicantList::factory()->create([
                'applicants_id' => $applicant,
                'created_at' => date("2022-m-d H:i:s") //change this
            ]);

            $applicantList->rating()->create([
                'rate' => $rating
            ]);

        }else{

            $applicantList = ApplicantList::factory()->create([
                'applicants_id' => $applicant,
                'created_at' => date("2022-m-d H:i:s"), //change this
                'review' => 'Yes',
            ]);

            $applicantList->rating()->create([
                'rate' => $rating
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

        $barangays = DB::table('barangays')->get();
        $index = rand(0, 25);
        return [
            'applicants_id' => $applicant,
            'country' => 'Philippines',
            'province' => 'South Cotabato',
            'city' => 'General Santos',
            'barangay' => $barangays[$index]->barangay,
            'street' => $this->faker->sentence(),
            'region' => 12,
            'zipcode' => 9500,
            'created_at' => now(),

        ];
    }
}
