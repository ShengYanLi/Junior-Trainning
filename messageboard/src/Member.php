<?php

// src/Member.php
/**
 * @Entity @Table(name="member")
 * */
class Member
{

    /**
     * @Id
     * @Column(type="string")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $password;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return $this->id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return $this->password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return $this->name
     */
    public function getName()
    {
        return $this->name;
    }

}
