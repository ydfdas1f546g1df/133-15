<?php
if (!isset($sub)) {
    $sub = 0;
}
$path = str_repeat("../", $sub);

require_once $path.'classes/user.php';
class userListClass
{
    /** @var user[] */
    public array $userClassList = [];

    public function __construct($filePath = "json/users.json")
    {
        $filePath = $GLOBALS['path'] . $filePath;
        $jsonObjectRaw = json_decode(file_get_contents($filePath));

//        echo "<pre>";
//        print_r($jsonObjectRaw);
//        echo "</pre>";


        foreach ($jsonObjectRaw->users as $user) {
//            echo "<pre>";
//            print_r($user);
//            echo "</pre>";
            $this->userClassList[$user->id] = new user(
                $user->name,
                $user->LastLogin,
                $user->isAdmin,
                $user->LastIP,
                $user->password,
                $user->id,
                $user->LastFalseLogin,
                $user->isLocked
            );
        }
    }
    function delete(int $id):void{
        unset($this->userClassList[$id]);
        $this->write();
    }

    function write($filePath = "json/users.json"): void
    {
        $filePath = $GLOBALS['path'] . $filePath;
        $usersArray['users'][] = [];
        foreach ($this->userClassList as $userObj) {
            $usersArray['users'][$userObj->id] = [
                'id' => $userObj->id,
                'name' => $userObj->name,
                'isAdmin' => $userObj->isAdmin,
                'password' => $userObj->password,
                'LastLogin' => $userObj->lastLogin,
                'LastIP' => $userObj->lastIP,
                'LastFalseLogin' => $userObj->LastFalseLogin,
                'isLocked' => $userObj->isLocked
            ];
        }

//        echo "<pre>";
//        print_r(json_encode($eventsArray, JSON_PRETTY_PRINT));
//        echo "</pre>";
        file_put_contents($filePath, json_encode($usersArray, JSON_PRETTY_PRINT));
    }

    function add(string $name, string $password, bool $isAdmin, bool $islocked): void
    {
        $this->userClassList[] = new user($name, 0, $isAdmin, "", $password, $this->userClassList[count($this->userClassList)-1]->id+1, [], $islocked);
        $this->write();
    }
}