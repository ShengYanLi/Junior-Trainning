<?php

/**
 * @Entity
 * @Table(name="message")
 * */
class Message
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="integer")
     */
    protected $parentId;

    /**
     * @var Member|null the member this message belongs (if any)
     * @ManyToOne(targetEntity="Member", inversedBy="messages")
     * @JoinColumn(name="member_id", referencedColumnName="id")
     */
    protected $member;

    /**
     * @Column(type="datetime")
     */
    protected $time;

    /**
     * @Column(type="text")
     */
    protected $content;

    /**
     * @param integer $parentId 上層留言編號
     * @param datetime $time 留言時間
     * @param text $content 留言內容
     */
    public function __construct($parentId, $time, $content)
    {
        $this->setParentId($parentId);
        $this->setTime($time);
        $this->setContent($content);
    }

    /**
     * 取得留言編號
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 設定此留言的上層留言編號
     * @param integer $parentId 上層留言編號
     * @return Message
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * 取得此留言的上層留言編號
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * 設定留言的會員
     * @param Member $member 留言者
     * @return Message
     */
    public function setMember($member)
    {
        $this->member = $member;
    }

    /**
     * 取得留言的會員
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * 設定留言時間
     * @param datetime $time 留言時間
     * @return Message
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * 取得留言時間
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time->format('Y-m-d H:i:s');
    }

    /**
     * 設定留言內容
     * @param text $content 留言內容
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * 取得留言內容
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

}
