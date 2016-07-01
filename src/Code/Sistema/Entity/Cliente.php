<?php

namespace Code\Sistema\Entity;

use Code\Sistema\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\Code\Sistema\Repository\ClienteRepository")
 * @ORM\Table(name="clientes")
 *
 */
class Cliente extends AbstractEntity
{
   /**
    * @ORM\Column(name="id", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(name="email",type="string",length=45)
     */
    private $email;

    /**
     *
     * @ORM\OneToOne(targetEntity="Code\Sistema\Entity\ClienteProfile")
     * @ORM\JoinColumn(name="cliente_profile",referencedColumnName="id")
     *
     */
    private $profile;

    /**
     * @ORM\ManyToOne(targetEntity="Code\Sistema\Entity\Cupom")
     * @ORM\JoinColumn(name="cupom_id", referencedColumnName="id")
     *
     */
    private $cumpom;


    /**
     * @ORM\ManyToMany(targetEntity="Code\Sistema\Entity\Interesse")
     * @ORM\JoinTable(name="clientes_interesses",
     *     joinColumns={@ORM\JoinColumn(name="cliente_id", referencedColumnName = "id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="interesse_id", referencedColumnName = "id")}
     * )
     *
     */
    private $interesses;

    /**
     * Cliente constructor.
     * @param $interesses
     */
    public function __construct($interesses = null)
    {
        $this->interesses = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getCumpom()
    {
        return $this->cumpom;
    }

    /**
     * @param mixed $cumpom
     */
    public function setCumpom($cumpom)
    {
        $this->cumpom = $cumpom;
    }

    /**
     * @return mixed
     */
    public function getInteresses()
    {
        return $this->interesses;
    }

    /**
     * @param mixed $interesses
     */
    public function addInteresse($interesses)
    {
        $this->interesses->add($interesses);
    }


}