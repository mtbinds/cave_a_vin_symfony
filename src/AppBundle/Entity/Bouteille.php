<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bouteille
 *
 * @ORM\Table(name="bouteille")
 * @ORM\Entity
 */
class Bouteille
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idVin;

    /**
     * @var integer
     *
     * @ORM\Column(name="millesime", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $millesime;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_note", type="date", nullable=true)
     */
    private $dateNote;



    /**
     * Set idVin
     *
     * @param integer $idVin
     *
     * @return Bouteille
     */
    public function setIdVin($idVin)
    {
        $this->idVin = $idVin;

        return $this;
    }

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
     * Set millesime
     *
     * @param integer $millesime
     *
     * @return Bouteille
     */
    public function setMillesime($millesime)
    {
        $this->millesime = $millesime;

        return $this;
    }

    /**
     * Get millesime
     *
     * @return integer
     */
    public function getMillesime()
    {
        return $this->millesime;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Bouteille
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Bouteille
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Bouteille
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set dateNote
     *
     * @param \DateTime $dateNote
     *
     * @return Bouteille
     */
    public function setDateNote($dateNote)
    {
        $this->dateNote = $dateNote;

        return $this;
    }

    /**
     * Get dateNote
     *
     * @return \DateTime
     */
    public function getDateNote()
    {
        return $this->dateNote;
    }
}
