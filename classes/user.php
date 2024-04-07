<?php

class user
{
    public string $name;
    public int $lastLogin;
    public bool $isAdmin;
    public string $lastIP;

    public function __construct(string $name, int $lastLogin, bool $isAdmin, string $lastIP)
    {
        $this->name = $name;
        $this->lastLogin = $lastLogin;
        $this->isAdmin = $isAdmin;
        $this->lastIP = $lastIP;

    }
}