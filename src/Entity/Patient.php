<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\User;
use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ApiResource()
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient extends User
{
    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qrCode;

    /**
     * @ORM\OneToMany(targetEntity=Medecin::class, mappedBy="Patient")
     */
    private $medecins;

    /**
     * @ORM\ManyToOne(targetEntity=Medecin::class, inversedBy="patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medecin;

    /**
     * @ORM\ManyToMany(targetEntity=Proche::class, inversedBy="patients")
     */
    private $Prohe;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="patient")
     */
    private $consultation;

    public function __construct()
    {
        $this->medecins = new ArrayCollection();
        $this->Prohe = new ArrayCollection();
        $this->consultation = new ArrayCollection();
    }

   

    public function getQrCode(): ?string
    {
        return $this->qrCode;
    }

    public function setQrCode(string $qrCode): self
    {
        $this->qrCode = $qrCode;

        return $this;
    }

    /**
     * @return Collection|Medecin[]
     */
    public function getMedecins(): Collection
    {
        return $this->medecins;
    }

    public function addMedecin(Medecin $medecin): self
    {
        if (!$this->medecins->contains($medecin)) {
            $this->medecins[] = $medecin;
            $medecin->setPatient($this);
        }

        return $this;
    }

    public function removeMedecin(Medecin $medecin): self
    {
        if ($this->medecins->contains($medecin)) {
            $this->medecins->removeElement($medecin);
            // set the owning side to null (unless already changed)
            if ($medecin->getPatient() === $this) {
                $medecin->setPatient(null);
            }
        }

        return $this;
    }

    public function getMedecin(): ?Medecin
    {
        return $this->medecin;
    }

    public function setMedecin(?Medecin $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }

    /**
     * @return Collection|Proche[]
     */
    public function getProhe(): Collection
    {
        return $this->Prohe;
    }

    public function addProhe(Proche $prohe): self
    {
        if (!$this->Prohe->contains($prohe)) {
            $this->Prohe[] = $prohe;
        }

        return $this;
    }

    public function removeProhe(Proche $prohe): self
    {
        if ($this->Prohe->contains($prohe)) {
            $this->Prohe->removeElement($prohe);
        }

        return $this;
    }

    /**
     * @return Collection|Consultation[]
     */
    public function getConsultation(): Collection
    {
        return $this->consultation;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultation->contains($consultation)) {
            $this->consultation[] = $consultation;
            $consultation->setPatient($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultation->contains($consultation)) {
            $this->consultation->removeElement($consultation);
            // set the owning side to null (unless already changed)
            if ($consultation->getPatient() === $this) {
                $consultation->setPatient(null);
            }
        }

        return $this;
    }
}
