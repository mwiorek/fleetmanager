<?php
// ERROR_CODES

define('ERROR_NAME_CSRF_TOKEN_ERROR', 'Session error please try again.');

define('ERROR_NAME_UNDEFINED_ERROR_CODE', 'Unknown error');
define('ERROR_NAME_LOGIN_EMAIL_NOT_FOUND', sprintf('The provided email address not register in our database, <a class="alert-link" href="%s">register an account</a> instead or provide a registered email address', FILENAME_REGISTER));
define('ERROR_NAME_PASSWORD_INCORRECT', 'Password is incorrect');
define('ERROR_NAME_NOT_VALID_NAME', 'Please enter a valid name');
define('ERROR_NAME_REGISTER_USER_EMAIL_ALREADY_EXISTS', sprintf('Email address already exists in our database, <a class="alert-link" href="%s">log in</a> instead or provide a different email address', FILENAME_LOGIN));
define('ERROR_NAME_ACCOUNT_SETTINGS_EMAIL_ALREADY_EXISTS', 'Email address is already registered to another user, please provide a unique email address');
define('ERROR_NAME_NOT_VALID_EMAIL_ADDRESS', 'Please enter a valid email address');
define('ERROR_NAME_NO_EMAIL_ADDRESS', 'Please enter a valid email address');
define('ERROR_NAME_NO_PASSWORD_PROVIDED', 'You need to provide a password');
define('ERROR_NAME_NO_PASSWORD_CONFIRMATION_PROVIDED', 'You need to provide a password confirmation that matches your original password');
define('ERROR_NAME_PASSWORDS_DO_NOT_MATCH', 'Your passwords do not match.');
define('ERROR_NAME_NO_OLD_PASSWORD_PROVIDED', 'You need to provide your current password');
define('ERROR_NAME_NO_NEW_PASSWORD_PROVIDED', 'Please provide a new password');

define('ERROR_NAME_PERMISSION_DENIED', 'You do not have permission to perform this task');
