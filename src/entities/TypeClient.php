<?php

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="TypeClient")
 */
class TypeClient
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
     * One TypeClient has many Client. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Client", mappedBy="type_client")
     */
    private $client;

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