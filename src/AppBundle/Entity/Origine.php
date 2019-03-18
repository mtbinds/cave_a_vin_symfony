<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Origine
 *
 * @ORM\Table(name="origine")
 * @ORM\Entity
 */
class Origine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_appellation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAppellation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_appellation", type="string", length=30, nullable=false)
     */
    private $nomAppellation;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=30, nullable=false)
     */
    private $region;



    /**
     * Get idAppellation
     *
     * @return integer
     */
    public function getIdAppellation()
    {
        return $this->idAppellation;
    }

    /**
     * Set nomAppellation
     *
     * @param string $nomAppellation
     *
     * @return Origine
     */
    public function setNomAppellation($nomAppellation)
    {
        $this->nomAppellation = $nomAppellation;

        return $this;
    }

    /**
     * Get nomAppellation
     *
     * @return string
     */
    public function getNomAppellation()
    {
        return $this->nomAppellation;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Origine
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }
}
