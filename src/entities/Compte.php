<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="Compte")
 */
class Compte 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $numero;

    /**
     * @ORM\Column(type="string")
     */
    private $cleRip;

    /**
     * @ORM\Column(type="integer")
     */
    private $solde;

    /**
     * @ORM\Column(type="string")
     */
    private $etat;

    /**
     * @ORM\Column(type="string")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="string")
     */
    private $dateFermeture;

    /**
     * Many compte have one type_compte. This is the owning side.
     * @ORM\ManyToOne(targetEntity="TypeCompte", inversedBy="compte")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type_compte;

    /**
     * Many compte have one client. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="compte")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;


     /**
     * one compte havs many operation. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Operation", inversedBy="compte")
     * @ORM\JoinColumn(name="operation_id", referencedColumnName="id")
     */
    private $operation;


    public function __construct()
    {
        $this->operation = new ArrayCollection();
    }

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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getCleRip()
    {
        return $this->cleRip;
    }

    /**
     * @param mixed $cleRip
     */
    public function setCleRip($cleRip)
    {
        $this->cleRip = $cleRip;
    }

    /**
     * @return mixed
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * @param mixed $solde
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getDateFermeture()
    {
        return $this->dateFermeture;
    }

    /**
     * @param mixed $dateFermeture
     */
    public function setDateFermeture($dateFermeture)
    {
        $this->dateFermeture = $dateFermeture;
    }

    /**
     * @return mixed
     */
    public function getTypeCompte()
    {
        return $this->type_compte;
    }

    /**
     * @param mixed $type_compte
     */
    public function setTypeCompte($type_compte)
    {
        $this->type_compte = $type_compte;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }


}