<?php

// Username
define('USERNAME_NOT_EXISTS_ERROR', "Didn't find an account with specified username.");
define('USERNAME_EXISTS_ERROR', 'Username already exists.');
define('USERNAME_MISSING_ERROR', 'You must include a username.');
define('USERNAME_SHORT_ERROR', 'Username must contain at least 3 characters.');
define('USERNAME_LONG_ERROR', 'Username must have less than 64 characters.');

// Email
define('EMAIL_EXISTS_ERROR', 'Email address already exists.');
define('EMAIL_MISSING_ERROR', 'You must include an email address.');
define('EMAIL_SHORT_ERROR', 'Email must contain at least 3 characters.');
define('EMAIL_LONG_ERROR', 'Email must have less than 64 characters.');
define('EMAIL_NOT_VALID_ERROR', 'Email address is not valid.');
define('EMAIL_NOT_FOUND_ERROR', 'Email address not found.');

// Password
define('PASSWORD_NOT_CORRECT_ERROR', 'Wrong password.');
define('PASSWORD_MISSING_ERROR', 'You must include a password.');
define('PASSWORD_SHORT_ERROR', 'Password must contain at least 8 characters.');
define('PASSWORD_LONG_ERROR', 'Password must have less than 64 characters.');
define('PASSWORD_REQUIRES_UPPERCASE_ERROR', 'Password must contain at least 1 uppercase letter.');
define('PASSWORD_REQUIRES_LOWERCASE_ERROR', 'Password must contain at least 1 lowercase letter.');
define('PASSWORD_REQUIRES_NUMBER_ERROR', 'Password must contain at least 1 number.');

// Confirm Password
define('CONFIRM_PASSWORD_MISSING_ERROR', 'Please confirm password.');
define('CONFIRM_PASSWORD_DIFFERENCE_ERROR', 'Passwords do not match.');

// Street Address
define('STREET_ADDRESS_MISSING_ERROR', 'You must include an address.');
define('STREET_ADDRESS_SHORT_ERROR', 'Street address input is too short.');
define('STREET_ADDRESS_LONG_ERROR', 'Street address input is too long.');

// City
define('CITY_MISSING_ERROR', 'You must include a city.');
define('CITY_SHORT_ERROR', 'City input is too short.');
define('CITY_LONG_ERROR', 'City input is too long.');

// Country
define('COUNTRY_MISSING_ERROR', 'You must include a country.');

// Postal Code
define('POSTCODE_MISSING_ERROR', 'You must include a postcode.');
define('POSTCODE_SHORT_ERROR', 'Postcode input is too short.');
define('POSTCODE_LONG_ERROR', 'Postcode input is too long.');

// Login
define('LOGIN_ERROR', 'Incorrect username & password combination.');
