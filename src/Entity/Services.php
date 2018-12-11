<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicesRepository")
 */
class Services
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaine1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaine2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaine3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaine4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaine5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDomaine1(): ?string
    {
        return $this->domaine1;
    }

    public function setDomaine1(?string $domaine1): self
    {
        $this->domaine1 = $domaine1;

        return $this;
    }

    public function getDomaine2(): ?string
    {
        return $this->domaine2;
    }

    public function setDomaine2(?string $domaine2): self
    {
        $this->domaine2 = $domaine2;

        return $this;
    }

    public function getDomaine3(): ?string
    {
        return $this->domaine3;
    }

    public function setDomaine3(?string $domaine3): self
    {
        $this->domaine3 = $domaine3;

        return $this;
    }

    public function getDomaine4(): ?string
    {
        return $this->domaine4;
    }

    public function setDomaine4(?string $domaine4): self
    {
        $this->domaine4 = $domaine4;

        return $this;
    }

    public function getDomaine5(): ?string
    {
        return $this->domaine5;
    }

    public function setDomaine5(?string $domaine5): self
    {
        $this->domaine5 = $domaine5;

        return $this;
    }
}
