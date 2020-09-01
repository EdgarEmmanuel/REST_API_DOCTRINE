<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="Operation")
 */
class Operation 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

     /**
     * @ORM\Column(type="string")
     */
    private $nomOperation;

     /**
     * @ORM\Column(type="string")
     */
    private $date;

    /**
     * One Operation has one Compte. This is the owning side.
     * @ORM\OneToOne(targetEntity="Compte")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id")
     */
    private $compte;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function setMontant($montant)
    {
        $this->montant=$montant;
    }

    /**
     * @param mixed $numero
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @return mixed
     */
    public function getnomOperation()
    {
        return $this->nomOperation;
    }

    /**
     * @param mixed $cleRip
     */
    public function setnomOperation($nomOperation)
    {
        $this->nomOperation = $nomOperation;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getCompte(){
        return $this->compte;
    }

    


}