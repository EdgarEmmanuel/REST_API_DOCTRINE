<?php

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="TypeCompte")
 */
class TypeCompte
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
    private $libelle;

    /**
     * One TypeCompte has many Compte. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Compte", mappedBy="type_compte")
     */
    private $compte;

    /**
     * TypeCompteRepository constructor.
     */
    public function __construct()
    {
        $this->compte=new ArrayCollection();
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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
}