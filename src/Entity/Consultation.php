<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $temperature;

    /**
     * @ORM\Column(type="integer")
     */
    private $pressionArterielle;

    /**
     * @ORM\Column(type="integer")
     */
    private $frequenceCardiaque;

    /**
     * @ORM\Column(type="integer")
     */
    private $tauxOxygene;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="consultation")
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

    public function getTemperature(): ?int
    {
        return $this->temperature;
    }

    public function setTemperature(int $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getPressionArterielle(): ?int
    {
        return $this->pressionArterielle;
    }

    public function setPressionArterielle(int $pressionArterielle): self
    {
        $this->pressionArterielle = $pressionArterielle;

        return $this;
    }

    public function getFrequenceCardiaque(): ?int
    {
        return $this->frequenceCardiaque;
    }

    public function setFrequenceCardiaque(int $frequenceCardiaque): self
    {
        $this->frequenceCardiaque = $frequenceCardiaque;

        return $this;
    }

    public function getTauxOxygene(): ?int
    {
        return $this->tauxOxygene;
    }

    public function setTauxOxygene(int $tauxOxygene): self
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
