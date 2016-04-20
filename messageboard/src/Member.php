<?php

use Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="member")
 * */
class Member
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", unique=TRUE)
     */
    protected $account;

    /**
     * @Column(type="string")
     */
    protected $password;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @var Collection
     * @OneToMany(targetEntity="Message", mappedBy="member")
     */
    protected $messages;

    /**
     * @param string $account 帳號
     * @param string $password 密碼
     * @param string $name 名稱
     */
    public function __construct($account, $password, $name)
    {
        $this->messages = new ArrayCollection();
        $this->setAccount($account);
        $this->setPassword($password);
        $this->setName($name);
    }

    /**
     * 取得會員編號
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 設定會員帳號
     * @param string $account 帳號
     * @return Member
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * 取得會員帳號
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * 設定會員密碼
     * @param string $password 密碼
     * @return Member
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * 取得會員密碼
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * 設定會員名稱
     * @param string $name 名稱
     * @return Member
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 取得會員名稱
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 取得此會員留言集合
     * @return Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

}
