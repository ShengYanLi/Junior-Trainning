<?php

// src/Message.php
/**
 * @Entity @Table(name="message")
 * */
class Message
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $sno;

    /**
     * @Column(type="integer")
     */
    protected $parent;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @Column(type="datetime")
     */
    protected $time;

    /**
     * @Column(type="text")
     */
    protected $content;

    /**
     * @return $this->sno
     */
    public function getSno()
    {
        return $this->sno;
    }

    /**
     * @param integer $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return $this->parent
     */
    public function getParent()
    {
        return $this->parent;
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

    /**
     * @param datetime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return $this->time
     */
    public function getTime()
    {
        return $this->time->format('Y-m-d H:i:s');
    }

    /**
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return $this->content
     */
    public function getContent()
    {
        return $this->content;
    }

}
