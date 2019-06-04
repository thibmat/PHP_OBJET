<?php

class User{
  /**
  * @var int
  */
    private $id;
  /**
  * @var string
  */
    private $username;
  /**
  * @var string
  */
    private $email;
  /**
  *@var string
  */
    private $password;


    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param int id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of Username
     *
     * @param string username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param string email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Get the value of Password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Set the value of Password & Hash it
     *
     * @return string
     */
    public function setPassword(string $password): void
    {
        // Hashage
        $hash = password_hash($password, PASSWORD_ARGON2I);
        // Stockage
        $this->password = $hash;
    }
}
?>
