<?php

class User
{
    public string $name = 'Hannan Miah';
    public string $email = 'hannanhridoy@gmail.com';

    public function __construct(public Auth $auth, public Profile $profile, public Post $post)
    {

    }

    public function authenticate()
    {
        $this->auth->authenticate($this->name, $this->email);
    }

    public function createPost()
    {
        $this->post->create();
    }

    public function createProfile()
    {
        $this->profile->create($this->name, $this->email);
    }
}

class Profile
{
    public array $data = [];

    public function create($name, $email)
    {
        $this->data = ['name' => $name, 'email' => $email];
        echo "Profile created....." . PHP_EOL;
    }
}

class Post
{
    public array $data = [];

    public function create()
    {
        $this->data[] = ['title' => 'this is title', 'body' => 'this is body'];
        echo "Post created...." . PHP_EOL;
    }
}

class Auth
{
    private bool $authenticated = false;

    public function authenticate($name, $email)
    {
        echo "Name: {$name} Email: {$email}" . PHP_EOL;
        $this->authenticated = true;
        return true;
    }

    public function isAuthenticated()
    {
        return $this->authenticated;
    }
}

$user = new User(new Auth, new Profile(), new Post());
$user->authenticate();
$user->createProfile();
$user->createPost();

