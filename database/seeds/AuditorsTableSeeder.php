<?php

use Illuminate\Database\Seeder;
use App\Auditor;
use App\User;
use App\Person;
class AuditorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Auditor::class, 5)->create();

      $user = new App\User();
      $user->password = Hash::make('auditor');
      $user->email = 'auditor@auditor.com';
      $user->name = 'Auditor';
      $user->person_id = Auditor::inRandomOrder()->first()->person_id;
      $user->save();
      $user->assignRole('Auditor');
      //
      // $location = new App\Location();
      // $location->name = '';
      // $location->province_id = ;
      // $location->save();
      // $address = new App\Address();
      // $address->street = '';
      // $address->location_id = $location->id;
      // $address->save();
      // $person = new App\Person();
      // $person->name = '';
      // $person->dni = '';
      // $person->birthdate = '';
      // $person->address_id = $address->id;
      // $person->birthdate = Auditor::inRandomOrder()->first()->person_id;
      // $person->save();
      // $patient = new App\Patient();
      // $patient->person_id = $person->id;
      // $patient->save();
      // $expedient = new Expedient();
      // $expedient->client_id = 1;
      // $expedient->patient_id = $patient->id;
      // $expedient->save();
      // $diagnosisType = new DiagnosisType();
      // $diagnosisType->name = '';
      // $diagnosisType->save();
      // $diagnosis = new Diagnosis();
      // $diagnosis->diagnosisType_id = $diagnosisType->id;
      // $diagnosis->expedient_id = $expedient->id;
      // $audit = new App\Audit();
      // $audit->expedient_id = $expedient->id;
      // $audit->conclution = '';
      // $audit->save();
      // $recommendation = new App\Recommendation();
      // $recommendation->name = '';
      // $recommendation->save();
      // $auditRecommendation = new App\AuditRecommendation();
      // $auditRecommendation->recommendation_id = $audit->id;
      // $auditRecommendation->audit_id = $recommendation->id;
      // $auditRecommendation->save();
      // $objective= new App\Objective();
      // $objective->name = '';
      // $objective->save();
      // $audit->objectives()->sync($objective);


    }
}
