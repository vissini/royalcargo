<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Company;
use App\Model\Contact;
use App\Model\Phone;
use Faker\Generator as Faker;

require_once __DIR__ . '/../faker_data/document_number.php';

$factory->define(Company::class, function (Faker $faker){
    return [
        'city' => $faker->city,
    ];
});

$factory->state(Company::class,"fisico", function (Faker $faker) {
    $cpfs = cpfs();
    return [
        'name' => $faker->name,
        'company_type' => 1,
        'document_number' => $cpfs[array_rand($cpfs,1)],
        'date_birth' => $faker->date(),
        'rg' => $faker->numberBetween($min = 10000, $max = 99999999),
    ];
});

$factory->state(Company::class,"juridico", function (Faker $faker) {
    $cnpjs = cnpjs();
    return [
        'name' => $faker->company,
        'company_type' => 2,
        'document_number' => $cnpjs[array_rand($cnpjs,1)],
        'fantasy_name' => $faker->company." ".$faker->companySuffix,
    ];
});

$factory->define(Contact::class, function ($faker) use ($factory) {
    return [
    'name' => $faker->company(),
    ];
});

$factory->define(Phone::class, function ($faker) use ($factory) {
    return [
    'phone_number' => $faker->phone(),
    ];
});
