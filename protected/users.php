<?php
function ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

class Users {
    public function get(){
        try {
            $f = fopen("users.json", "r") or die("Unable to open file!");
            $t = fread($f,filesize("users.json"));
            fclose($f);

            return $t;
        } catch (Exception $e) {
            return false;
        }
    }
    public function add($name, $pass, $email){
        try {
            $u = json_decode($this->get());
            $l = count($u);
            $u[$l] = new \stdClass();
            $u[$l]->name = $name;
            $u[$l]->pass = md5($pass);
            $u[$l]->email = $email;
            $u[$l]->ip = ip();
            $u[$l]->lastLogin = "";
            $u[$l]->messages = array();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
$class = new Users();
echo $class->add('me', 'me', 'me');
?>
