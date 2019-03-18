<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vin
 *
 * @ORM\Table(name="vin", indexes={@ORM\Index(name="id_appellation", columns={"id_appellation"})})
 * @ORM\Entity
 */
class Vin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_vin", type="string", length=30, nullable=false)
     */
    private $nomVin;

    /**
     * @var string
     *
     * @ORM\Column(name="type_vin", type="string", length=15, nullable=true)
     */
    private $typeVin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_appellation", type="integer", nullable=false)
     */
    private $idAppellation;



    /**
     * Get idVin
     *
     * @return integer
     */
    public function getIdVin()
    {
        return $this->idVin;
    }

    /**
     * Set nomVin
     *
     * @param string $nomVin
     *
     * @return Vin
     */
    public function setNomVin($nomVin)
    {
        $this->nomVin = $nomVin;

        return $this;
    }

    /**
     * Get nomVin
     *
     * @return string
     */
    public function getNomVin()
    {
        return $this->nomVin;
    }

    /**
     * Set typeVin
     *
     * @param string $typeVin
     *
     * @return Vin
     */
    public function setTypeVin($typeVin)
    {
        $this->typeVin = $typeVin;

        return $this;
    }

    /**
     * Get typeVin
     *
     * @return string
     */
    public function getTypeVin()
    {
        return $this->typeVin;
    }

    /**
     * Set idAppellation
     *
     * @param integer $idAppellation
     *
     * @return Vin
     */
    public function setIdAppellation($idAppellation)
    {
        $this->idAppellation = $idAppellation;

        return $this;
    }

    /**
     * Get idAppellation
     *
     * @return integer
     */
    public function getIdAppellation()
    {
        return $this->idAppellation;
    }
}
