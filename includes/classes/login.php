<?php

class LoginException extends Exception {
	const INVALID_USERNAME = 'login.failure.invalidUsername';
    const ACCOUNT_LOCKED = 'login.failure.accountLocked';

    public function __construct($code) {
        parent::__construct('Authentication failed', $code);
    }

}
//http://codereview.stackexchange.com/questions/18068/how-would-a-senior-php-developer-design-this-login-class

class Login {

	public function register($emailadress, $name, $password, $pasword_confirmation){

		//using the PASSWORD_DEFAULT algorith allows future safe algorithms
		// current (2014-09-09 v.5.5.14)DEFAULT is BCRYPT using cost 10 and random generated 
		// salt database field should accoring to php documentation be VARCHAR(255)

		if ($password !== $password_confirmation){
			throw new LoginException(LoginException::PASSWORDS_DO NOT_MATC);
		}

		$password_hash = password_hash($password, PASSWORD_DEFAULT);

		return $this->save(array(
			'emailadress' => $emailadress,
			'name' => $name,
			'password' => $password_hash
			));

	}
	
	protected function save($user){
		global $mysqli;



		$mysqli->prepare("INSERT INTO " . TABLE_USERS . " (emailadress, name, password) values(" . $user['emailadress'] . ", " . $user['name'] . ", " . $password);

	}

	public function authenticate(...){

		// ...
        $acctInfo = $stmt->fetch();
        if ($acctInfo !== null) {
            if ($acctInfo['locked']) {
                throw new LoginException(LoginException::ACCOUNT_LOCKED);
            }
            $this->loginUser();
            return true;
        } else {
            throw new LoginException(LoginException::INVALID_USERNAME_OR_PASSWORD);
        }


	}

}

/*

try {
    // ...
} catch (LoginException $e) {

    // Do common exception handling setup here...

    switch ($e->getCode()) {
        case LoginException::INVALID_USERNAME_OR_PASSWORD:
        // Differentiated exception handling for invalid credentials
        break;

        case LoginException::ACCOUNT_LOCKED:
        // Differentiated exception handling for a locked account
        break;
    }

    // Do common exception handling output here...
}
*/