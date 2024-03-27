<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PersonneModel
{
    #[Assert\NotBlank]
    private ?string $nom = null;
    #[Assert\NotBlank]
    private ?string $prenom = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

}