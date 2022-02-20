<?php
interface Authenticator {
    public function authenticate();
}

class FacebookAuthenticator implements Authenticator {
    public function authenticate()
    {
        echo "Facebook is trying to authenticate...".PHP_EOL;
    }
}

class GithubAuthenticator implements Authenticator {
    public function authenticate()
    {
        echo "Github is trying to authenticate with his own api".PHP_EOL;
    }
}

class Authenticate {
    public function __construct(public Authenticator $authenticator)
    {
    }

    public function login()
    {
        
    }

    public function register()
    {

    }

    public function authenticate()
    {
        $this->authenticator->authenticate();
    }
}

$auth = new Authenticate(new GithubAuthenticator());
$auth->authenticate();
