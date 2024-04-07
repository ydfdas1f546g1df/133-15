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
    public function write()
    {
        $user = [
            'LastLogin' => $this->lastLogin,
            'IsAdmin' => $this->isAdmin,
            'LastIP' => $this->lastIP,
        ];
        $user = parse_ini_file("ini/users.ini", True);
        $user[$this->name] = $user;
        write_php_ini($user, 'ini/users.ini');
    }
}