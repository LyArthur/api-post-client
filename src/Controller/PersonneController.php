<?php

namespace App\Controller;

use App\Form\PersonneType;
use App\Model\PersonneModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne/register', name: 'app_personne_register')]
    public function register(): Response
    {
        $personne = new PersonneModel();
        $form = $this->createForm(PersonneType::class, $personne);
        return $this->render('personne/index.html.twig', [
            'form' => $form
        ]);
    }
}
