<?php

class token{
    
    private $token_id;
    private $remember_me;

    /**
     * Get the value of token_id
     */
    public function getTokenId()
    {
        return $this->token_id;
    }

    /**
     * Set the value of token_id
     *
     * @return  self
     */
    public function setTokenId($token_id)
    {
        $this->token_id = $token_id;

        return $this;
    }

    /**
     * Get the value of remember_me
     */
    public function getRememberMe()
    {
        return $this->remember_me;
    }

    /**
     * Set the value of remember_me
     *
     * @return  self
     */
    public function setRememberMe($remember_me)
    {
        $this->remember_me = $remember_me;

        return $this;
    }
}