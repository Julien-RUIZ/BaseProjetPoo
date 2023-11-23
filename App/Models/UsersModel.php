<?php

namespace App\Models;

class UsersModel extends Model
{


    protected string $Name;
    protected string $FirstName;
    protected string $Email;
    protected string $Password;
    protected string $Birthday;

    public function __construct(){
        $this->table = 'users';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): bool
    {
        if(preg_match("/^[a-zA-Z\- ]+$/", $Name)){
            $this->Name = $Name;
            return true;
        }else{
            return false;
        }

    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->FirstName;
    }

    /**
     * @param string $FirstName
     */
    public function setFirstName(string $FirstName): bool
    {
        if(preg_match("/^[a-zA-ZÀ-ÿ\-']+$/u", $FirstName)){
            $this->FirstName = $FirstName;
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     */
    public function setEmail(string $Email): bool
    {
        if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $Email)){
            $this->Email = $Email;
            return true;
        }else{
            return false;
        }

    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     */
    public function setPassword(string $Password): void
    {
        $this->Password = $Password;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->Birthday;
    }

    /**
     * @param string $Birthday
     */
    public function setBirthday(string $Birthday): void
    {
        $this->Birthday = $Birthday;
    }
}