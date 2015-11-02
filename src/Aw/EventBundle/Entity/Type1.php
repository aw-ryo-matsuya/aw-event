<?php

namespace Aw\EventBundle\Entity;

use Aw\EventBundle\Entity\AppEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Type1
 *
 * @ORM\Table(name="type1")
 * @ORM\Entity(repositoryClass="Aw\EventBundle\Entity\Repository\Type1Repository")
 */
class Type1 extends AppEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question1", type="boolean", length=1, nullable=true)
     */
    private $question1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question2", type="boolean", length=1, nullable=true)
     */
    private $question2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question3", type="boolean", length=1, nullable=true)
     */
    private $question3;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question4", type="boolean", length=1, nullable=true)
     */
    private $question4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question5", type="boolean", length=1, nullable=true)
     */
    private $question5;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question6", type="boolean", length=1, nullable=true)
     */
    private $question6;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question7", type="boolean", length=1, nullable=true)
     */
    private $question7;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question8", type="boolean", length=1, nullable=true)
     */
    private $question8;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question9", type="boolean", length=1, nullable=true)
     */
    private $question9;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question10", type="boolean", length=1, nullable=true)
     */
    private $question10;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question11", type="boolean", length=1, nullable=true)
     */
    private $question11;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question12", type="boolean", length=1, nullable=true)
     */
    private $question12;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question13", type="boolean", length=1, nullable=true)
     */
    private $question13;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question14", type="boolean", length=1, nullable=true)
     */
    private $question14;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question15", type="boolean", length=1, nullable=true)
     */
    private $question15;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question16", type="boolean", length=1, nullable=true)
     */
    private $question16;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question17", type="boolean", length=1, nullable=true)
     */
    private $question17;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question18", type="boolean", length=1, nullable=true)
     */
    private $question18;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question19", type="boolean", length=1, nullable=true)
     */
    private $question19;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question20", type="boolean", length=1, nullable=true)
     */
    private $question20;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Type1
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set question1
     *
     * @param boolean $question1
     * @return Type1
     */
    public function setQuestion1($question1)
    {
        $this->question1 = $question1;

        return $this;
    }

    /**
     * Get question1
     *
     * @return boolean
     */
    public function getQuestion1()
    {
        return $this->question1;
    }

    /**
     * Set question2
     *
     * @param boolean $question2
     * @return Type1
     */
    public function setQuestion2($question2)
    {
        $this->question2 = $question2;

        return $this;
    }

    /**
     * Get question2
     *
     * @return boolean
     */
    public function getQuestion2()
    {
        return $this->question2;
    }

    /**
     * Set question3
     *
     * @param boolean $question3
     * @return Type1
     */
    public function setQuestion3($question3)
    {
        $this->question3 = $question3;

        return $this;
    }

    /**
     * Get question3
     *
     * @return boolean
     */
    public function getQuestion3()
    {
        return $this->question3;
    }

    /**
     * Set question4
     *
     * @param boolean $question4
     * @return Type1
     */
    public function setQuestion4($question4)
    {
        $this->question4 = $question4;

        return $this;
    }

    /**
     * Get question4
     *
     * @return boolean
     */
    public function getQuestion4()
    {
        return $this->question4;
    }

    /**
     * Set question5
     *
     * @param boolean $question5
     * @return Type1
     */
    public function setQuestion5($question5)
    {
        $this->question5 = $question5;

        return $this;
    }

    /**
     * Get question5
     *
     * @return boolean
     */
    public function getQuestion5()
    {
        return $this->question5;
    }

    /**
     * Set question6
     *
     * @param boolean $question6
     * @return Type1
     */
    public function setQuestion6($question6)
    {
        $this->question6 = $question6;

        return $this;
    }

    /**
     * Get question6
     *
     * @return boolean
     */
    public function getQuestion6()
    {
        return $this->question6;
    }

    /**
     * Set question7
     *
     * @param boolean $question7
     * @return Type1
     */
    public function setQuestion7($question7)
    {
        $this->question7 = $question7;

        return $this;
    }

    /**
     * Get question7
     *
     * @return boolean
     */
    public function getQuestion7()
    {
        return $this->question7;
    }

    /**
     * Set question8
     *
     * @param boolean $question8
     * @return Type1
     */
    public function setQuestion8($question8)
    {
        $this->question8 = $question8;

        return $this;
    }

    /**
     * Get question8
     *
     * @return boolean
     */
    public function getQuestion8()
    {
        return $this->question8;
    }

    /**
     * Set question9
     *
     * @param boolean $question9
     * @return Type1
     */
    public function setQuestion9($question9)
    {
        $this->question9 = $question9;

        return $this;
    }

    /**
     * Get question9
     *
     * @return boolean
     */
    public function getQuestion9()
    {
        return $this->question9;
    }

    /**
     * Set question10
     *
     * @param boolean $question10
     * @return Type1
     */
    public function setQuestion10($question10)
    {
        $this->question10 = $question10;

        return $this;
    }

    /**
     * Get question10
     *
     * @return boolean
     */
    public function getQuestion10()
    {
        return $this->question10;
    }

    /**
     * Set question11
     *
     * @param boolean $question11
     * @return Type1
     */
    public function setQuestion11($question11)
    {
        $this->question11 = $question11;

        return $this;
    }

    /**
     * Get question11
     *
     * @return boolean
     */
    public function getQuestion11()
    {
        return $this->question11;
    }

    /**
     * Set question12
     *
     * @param boolean $question12
     * @return Type1
     */
    public function setQuestion12($question12)
    {
        $this->question12 = $question12;

        return $this;
    }

    /**
     * Get question12
     *
     * @return boolean
     */
    public function getQuestion12()
    {
        return $this->question12;
    }

    /**
     * Set question13
     *
     * @param boolean $question13
     * @return Type1
     */
    public function setQuestion13($question13)
    {
        $this->question13 = $question13;

        return $this;
    }

    /**
     * Get question13
     *
     * @return boolean
     */
    public function getQuestion13()
    {
        return $this->question13;
    }

    /**
     * Set question14
     *
     * @param boolean $question14
     * @return Type1
     */
    public function setQuestion14($question14)
    {
        $this->question14 = $question14;

        return $this;
    }

    /**
     * Get question14
     *
     * @return boolean
     */
    public function getQuestion14()
    {
        return $this->question14;
    }

    /**
     * Set question15
     *
     * @param boolean $question15
     * @return Type1
     */
    public function setQuestion15($question15)
    {
        $this->question15 = $question15;

        return $this;
    }

    /**
     * Get question15
     *
     * @return boolean
     */
    public function getQuestion15()
    {
        return $this->question15;
    }

    /**
     * Set question16
     *
     * @param boolean $question16
     * @return Type1
     */
    public function setQuestion16($question16)
    {
        $this->question16 = $question16;

        return $this;
    }

    /**
     * Get question16
     *
     * @return boolean
     */
    public function getQuestion16()
    {
        return $this->question16;
    }

    /**
     * Set question17
     *
     * @param boolean $question17
     * @return Type1
     */
    public function setQuestion17($question17)
    {
        $this->question17 = $question17;

        return $this;
    }

    /**
     * Get question17
     *
     * @return boolean
     */
    public function getQuestion17()
    {
        return $this->question17;
    }

    /**
     * Set question18
     *
     * @param boolean $question18
     * @return Type1
     */
    public function setQuestion18($question18)
    {
        $this->question18 = $question18;

        return $this;
    }

    /**
     * Get question18
     *
     * @return boolean
     */
    public function getQuestion18()
    {
        return $this->question18;
    }

    /**
     * Set question19
     *
     * @param boolean $question19
     * @return Type1
     */
    public function setQuestion19($question19)
    {
        $this->question19 = $question19;

        return $this;
    }

    /**
     * Get question19
     *
     * @return boolean
     */
    public function getQuestion19()
    {
        return $this->question19;
    }

    /**
     * Set question20
     *
     * @param boolean $question20
     * @return Type1
     */
    public function setQuestion20($question20)
    {
        $this->question20 = $question20;

        return $this;
    }

    /**
     * Get question20
     *
     * @return boolean
     */
    public function getQuestion20()
    {
        return $this->question20;
    }
}
