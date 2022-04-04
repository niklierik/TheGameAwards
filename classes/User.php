<?php

class User
{
    private string $user;
    private string $pwd;

    /**
     * @param string $user
     * @param string $pwd
     */
    public function __construct(string $user = "", string $pwd = "")
    {
        $this->user = $user;
        $this->pwd = $pwd;
    }


    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }


}