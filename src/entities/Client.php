<?php 

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="Client")
 */
class Client{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\Column(type="string")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string")
     */
    private $matricule;


     /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     */
    private $login;

    /**
     * One client has many compte. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Compte", mappedBy="client")
     */
    private $compte;

    /**
     * One client has one compte. This is the inverse side.
     * @ORM\OneToOne(targetEntity="TypeClient")
     * @ORM\JoinColumn(name="type_client_id", referencedColumnName="id")
     */
    private $type_client;

    public function __construct(){
        $this->compte = new ArrayCollection();
    }


    public function getId(){
        return $this->id;
    }


    public function getNom(){
        return $this->nom;
    }

    public function setNom(string $nom){
        $this->nom=$nom;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword(string $pass){
        $this->password=$pass;
    }


    public function getLogin(){
        return $this->login;
    }

    public function setLogin(string $login){
        $this->login=$login;
    }


    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom(string $prenom){
        $this->prenom=$prenom;
    }

    public function getMatricule(){
        return $this->matricule;
    }

    public function setMatricule(string $mat){
        $this->matricule=$mat;
    }






}



?>