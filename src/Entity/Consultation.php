<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ApiResource()
 * Consultation
 *
 * @ORM\Table(name="consultation", indexes={@ORM\Index(name="IDX_964685A66B899279", columns={"patient_id"})})
 * @ORM\Entity
 */
class Consultation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="temperature", type="string", length=255, nullable=false)
     */
    private $temperature;

    /**
     * @var string
     *
     * @ORM\Column(name="pression_arterielle", type="string", length=255, nullable=false)
     */
    private $pressionArterielle;

    /**
     * @var string
     *
     * @ORM\Column(name="frequence_cardiauqe", type="string", length=255, nullable=false)
     */
    private $frequenceCardiauqe;

    /**
     * @var string
     *
     * @ORM\Column(name="taux_oxygene", type="string", length=255, nullable=false)
     */
    private $tauxOxygene;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     * })
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getPressionArterielle(): ?string
    {
        return $this->pressionArterielle;
    }

    public function setPressionArterielle(string $pressionArterielle): self
    {
        $this->pressionArterielle = $pressionArterielle;

        return $this;
    }

    public function getFrequenceCardiauqe(): ?string
    {
        return $this->frequenceCardiauqe;
    }

    public function setFrequenceCardiauqe(string $frequenceCardiauqe): self
    {
        $this->frequenceCardiauqe = $frequenceCardiauqe;

        return $this;
    }

    public function getTauxOxygene(): ?string
    {
        return $this->tauxOxygene;
    }

    public function setTauxOxygene(string $tauxOxygene): self
    {
        $this->tauxOxygene = $tauxOxygene;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }


}
