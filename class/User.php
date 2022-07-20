<?php
class User{
    const LIMIT_USERNAME = '5';
    const LIMIT_PWD = '6';
    private $nomuser;
    private $pwduser;

    public function __construct(string $nomuser, string $pwduser){
        $this->nomuser = $nomuser;
        $this->pwduser = $pwduser;
    }

    public function isValid():bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        if(strlen($this->nomuser) < self::LIMIT_USERNAME){
            $errors['nomuser']='Votre nom d\'utilsateur est trop court';
        }
        if(strlen($this->pwduser) < self::LIMIT_PWD){
            $errors['pwduser']='Votre mot de passe est trop court';
        }
        return $errors;
    }

    public function mistakes(): array
    {
        $errors = [];
        
        if(strcmp($this->nomuser, 'nomuser') != 0){
            $errors['nomuser']='le nom d\'utilsateur ne correspond pas';
        }
        if(strcmp($this->pwduser, 'pwduser') != 0){
            $errors['pwduser']='Le mot de passe ne correspond pas';
        }
        return $errors;
    }

}