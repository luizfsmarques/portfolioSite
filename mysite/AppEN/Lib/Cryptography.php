<?php

namespace AppEN\Lib;

class Cryptography
{

    private $safePassword;
    private $options;

    public function setSafePassword($password)
    {
        $this->options = ["cost"=>10];

        $this->safePassword = password_hash($password, PASSWORD_DEFAULT,$this->options);

    }

    public function getSafePassword()
    {
        return $this->safePassword;
    }

    public function checkToAuthentication($password,$safePassword)
    {
        return password_verify($password,$safePassword);
    }


}