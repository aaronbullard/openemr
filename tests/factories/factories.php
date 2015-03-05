<?php

$factory('OEMR\\Models\\User', [
	'username' => $faker->userName,
	'password' => $faker->md5,
	'fname' => $faker->firstName,
	'mname' => $faker->firstName,
	'lname' => $faker->lastName,
	'email_direct' => $faker->email,
	'street' => $faker->streetAddress,
	'city' => $faker->city,
	'state' => $faker->stateAbbr,
	'zip' => $faker->postcode,
	'phone' => $faker->phoneNumber,
	'notes' => $faker->paragraphs(3)
]);

$factory('OEMR\\Models\\Patient', [
	'title' => $faker->title,
	'fname' => $faker->firstName,
	'lname' => $faker->lastName,
	'mname' => $faker->firstName,
	'DOB' => $faker->date('Y-m-d', '-5 years'),
	'street' => $faker->streetAddress,
	'postal_code' => $faker->postcode,
	'city' => $faker->city,
	'state' => $faker->stateAbbr,
	'country_code' => 'US',
	'drivers_license' => $faker->randomNumber(9),
	// 'ss' => $faker->numberBetween(1),
	'occupation' => $faker->sentence,
	'phone_home' => $faker->phoneNumber,
	'phone_cell' => $faker->phoneNumber,
	'sex' => $faker->randomElement(['M', 'F']),
	'email' => $faker->freeEmail,
	'family_size' => $faker->randomDigit,
	'monthly_income' => $faker->numberBetween(25000, 120000),
	'pid' => $faker->unique()->randomNumber(5),
	'mothersname' => $faker->lastName
]);