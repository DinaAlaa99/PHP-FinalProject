<?php

class user
{
    private $user_id;
    private $password;
    private $email;

    public function __construct($email,$password) {
        $this->setPassword(sha1($password));
        $this->setEmail($email);

    }

    /**
     * Get the value of username
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
