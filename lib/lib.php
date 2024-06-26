<?php


function write_php_ini($array, $file)
{
    echo 'Deprecated: write_php_ini';
//    $res = array();
//    foreach ($array as $key => $val) {
//        if (is_array($val)) {
//            $res[] = "[$key]";
//            foreach ($val as $skey => $sval) {
//                if (is_array($sval)) {
//                    foreach ($sval as $i => $v) {
//                        $res[] = "$skey"."[] = " . (is_numeric($v) ? $v : '"' . $v . '"');
//                    }
//                } else {
//                    $res[] = "$skey = " . (is_numeric($sval) ? $sval : '"' . $sval . '"');
//                }
//            }
//        } else {
//            echo gettype($key);
//            if (is_array($val)) {
//                echo 'is array';
//                foreach ($val as $skey => $sval) {
//                    $res[] = $skey . "[] = " . (is_numeric($sval) ? $sval : '"' . $sval . '"');
//                }
//            } else {
//                $res[] = "$key = " . (is_numeric($val) ? $val : '"' . $val . '"');
//            }
//        }
//    }
//
//    safefilerewrite($file, implode("\r\n", $res));
}

function safefilerewrite($fileName, $dataToSave)
{
//    echo $dataToSave;
    if ($fp = fopen($fileName, 'w')) {
        $startTime = microtime(TRUE);
        do {
            $canWrite = flock($fp, LOCK_EX);
            // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
            if (!$canWrite) usleep(round(rand(0, 100) * 1000));
        } while ((!$canWrite) and ((microtime(TRUE) - $startTime) < 5));

        //file was locked so now we can store information
        if ($canWrite) {


            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

}

function checkPHPVersion($minVersion): void{
    if (version_compare(PHP_VERSION, $minVersion, '<')) {
        // Exit the script and display an error message
        exit("Error: Your PHP version is " . PHP_VERSION . ". This application requires at least PHP version " . $minVersion . " or higher.\n");
    }
}

function hashPw(string $password) : string{
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
}
