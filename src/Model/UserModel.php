<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class UserModel
{
    #[Assert\NotBlank,Assert\Email]
    private ?string $email = null;
    #[Assert\NotBlank]
    private ?string $mdp = null;

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    public function getMdp(): ?string {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): void {
        $this->mdp = $mdp;
    }
}