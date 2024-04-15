<?php

class settings
{
    public int $FalseLoginAttempts;

    public function __construct(string $filePath = "json/settings.json")
    {
        $filePath = $GLOBALS['path'] . $filePath;
        $jsonObjectRaw = json_decode(file_get_contents($filePath));
//        echo '<pre>';
//        print_r($jsonObjectRaw->settings);
//        echo '</pre>';
        $this->FalseLoginAttempts = $jsonObjectRaw->settings->FalseLoginAttempts;
    }

    public function write($filePath = "json/settings.json")
    {
        $filePath = $GLOBALS['path'] . $filePath;
        $settingsArray['settings'] = [
            'FalseLoginAttempts' => $this->FalseLoginAttempts
        ];
        file_put_contents($filePath,
            json_encode($settingsArray,
                JSON_PRETTY_PRINT));
    }
}