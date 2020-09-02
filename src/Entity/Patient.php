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
     * @ORM\ManyToMany(targetEntity=Proche::class, inversedBy="patients")
     */
    private $Prohe;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="patient")
     */
    private $consultation;

    /**
     * @ORM\ManyToOne(targetEntity=medecin::class, inversedBy="patients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medecin;

    public function __construct()
    {
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

    public function getMedecin(): ?medecin
    {
        return $this->medecin;
    }

    public function setMedecin(?medecin $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }
}
