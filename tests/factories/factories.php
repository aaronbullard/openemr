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
	'phone' => $faker->numerify('(###)-###-####'),
	'notes' => $faker->paragraphs(3)
]);

$factory('OEMR\\Models\\Patient', [
	'title' => $faker->randomElement(['Mr.', 'Ms.', 'Mrs.', 'Mr.']),
	'fname' => $faker->firstName,
	'lname' => $faker->lastName,
	'mname' => $faker->firstName,
	'DOB' => $faker->date('Y-m-d', '-15 years'),
	'street' => $faker->streetAddress,
	'postal_code' => $faker->postcode,
	'city' => $faker->city,
	'state' => $faker->stateAbbr,
	'country_code' => 'US',
	'drivers_license' => $faker->randomNumber(9),
	'ss' => $faker->numerify('###-##-####'),
	'occupation' => $faker->sentence,
	'phone_home' => $faker->numerify('(###)-###-####'),
	'phone_cell' => $faker->numerify('(###)-###-####'),
	'sex' => $faker->randomElement(['Male', 'Female']),
	'email' => $faker->freeEmail,
	'status' => $faker->randomElement(['single', 'married', 'divorced', 'widowed', 'separated', 'domestic partner']),
	'family_size' => $faker->randomDigit,
	'monthly_income' => $faker->numberBetween(25000, 120000),
	'pid' => $faker->unique()->randomNumber(5),
	'mothersname' => $faker->lastName
]);

$factory('OEMR\\Models\\Pnote', [
	'date' => $faker->dateTimeThisYear(),
	'body' => $faker->sentence,
	'pid' => 'factory:OEMR\\Models\\Patient',
	'user' => 'admin',
	'groupname' => 'Default',
	'activity' => 1,
	'authorized' => 1,
	'title' => 'Chart Note',
	'message_status' => 'New'
]);

$factory('OEMR\\Models\\Facility', [
	'name' => $faker->company,
	'phone' => $faker->numerify('(###)-###-####'),
	'fax' => $faker->numerify('(###)-###-####'),
	'street' => $faker->streetAddress,
	'city' => $faker->city,
	'postal_code' => $faker->postcode
]);

$factory('OEMR\\Models\\Appointment', [
  'pc_pid' => 'factory:OEMR\\Models\\Patient',
  'pc_title' => 'Office visit',
  'pc_time' => $faker->dateTimeThisMonth,
  'pc_hometext' => $faker->sentence,
  'pc_informant' => 'factory:OEMR\\Models\\User',
  'pc_facility' => 'factory:OEMR\\Models\\Facility'
]);