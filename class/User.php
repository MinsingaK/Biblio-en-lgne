<?php
class User{
    const LIMIT_USERNAME = '6';
    const LIMIT_PWD = '6';
    const LIMIT_DETAILS = '10';
    private $username;
    private $pwd;
    private $profession;
    private $details;
    private $email;


    public function __construct(string $username, string $pwd, string $details, string $profession, string $email){
        $this->username = $username;
        $this->pwd = $pwd;
        $this->details = $details;
        $this->profession = $profession;
        $this->email = $email;
    }

    public function isValid():bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        if(strlen($this->username) < self::LIMIT_USERNAME){
            $errors['username']='Votre nom d\'utilsateur est trop court';
        }
        if(strlen($this->pwd) < self::LIMIT_PWD){
            $errors['pwd']='Votre mot de passe est trop court';
        }
        if(strlen($this->details) < self::LIMIT_DETAILS){
            $errors['details']='Les détails sont assez courts, veuillez en rajouter s\'il vous plait';
        }
        return $errors;
    }

}