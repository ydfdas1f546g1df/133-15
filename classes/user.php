<?php

class user
{
    public int $id;
    public string $name;
    public string $password;
    public int $lastLogin;
    public bool $isLocked;
    public bool $isAdmin;
    public string $lastIP;
    public array $LastFalseLogin;

    public function __construct(string $name,
                                int    $lastLogin,
                                bool   $isAdmin,
                                string $lastIP,
                                string $password,
                                int    $id,
                                array  $LastFalseLogin,
                                bool   $isLocked = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->lastLogin = $lastLogin;
        $this->isAdmin = $isAdmin;
        $this->lastIP = $lastIP;
        $this->LastFalseLogin = $LastFalseLogin;
        $this->isLocked = $isLocked;
    }
}