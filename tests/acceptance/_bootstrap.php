<?php
// Here you can initialize variables that will be available to your tests
Artisan::call('migrate:refresh', ['--database' => 'local']);
Artisan::call('db:seed', ['--database' => 'local']);