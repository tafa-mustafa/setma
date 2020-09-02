<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MedecinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MedecinRepository::class)
 */
class Medecin extends User
{


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialite;

    /**
     * @ORM\OneToMany(targetEntity=Patient::class, mappedBy="medecin")
     */
    private $patients;

    public function __construct()
    {
        $this->patients = new ArrayCollection();
    }


    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getPatients(): Collection
    {
        return $this->patients;
    }

    public function addPatient(Patient $patient): self
    {
        if (!$this->patients->contains($patient)) {
            $this->patients[] = $patient;
            $patient->setMedecin($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patients->contains($patient)) {
            $this->patients->removeElement($patient);
            // set the owning side to null (unless already changed)
            if ($patient->getMedecin() === $this) {
                $patient->setMedecin(null);
            }
        }

        return $this;
    }
}
