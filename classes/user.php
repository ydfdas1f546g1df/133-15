<?php

class user
{
    public string $name;
    public string $password;
    public int $lastLogin;
    public bool $isAdmin;
    public string $lastIP;

    public function __construct(string $name, int $lastLogin, bool $isAdmin, string $lastIP, string $password)
    {
        $this->name = $name;
        $this->password = $password;
        $this->lastLogin = $lastLogin;
        $this->isAdmin = $isAdmin;
        $this->lastIP = $lastIP;

    }
}