<?php

namespace App\Controller;

use App\Form\PersonneType;
use App\Form\UserType;
use App\Model\UserModel;
use App\Model\PersonneModel;
use App\Services\ApiPosts;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne/register', name: 'app_personne_register')]
    public function register(RequestStack $request): Response {
        $personne = new PersonneModel();
        $form = $this->createForm(PersonneType::class, $personne);
        //traiter la soumission du formulaire
        $form->handleRequest($request->getCurrentRequest());
        if ($form->isSubmitted() && $form->isValid()) {
            //message flash
            $this->addFlash("success", "Le compte a bien été enregistré");
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('personne/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/personne/sign_in', name: 'app_personne_sign_in')]
    public function sign_in(RequestStack $request,
                            ApiPosts     $apiPosts): Response {
        $personne = new UserModel();
        $form = $this->createForm(UserType::class, $personne);
        $form->handleRequest($request->getCurrentRequest());
        if ($form->isSubmitted() && $form->isValid()) {
            //message flash
            dd($apiPosts->sign_in(["username" => $personne->getEmail(), "password" => $personne->getMdp()]));

            $this->addFlash("success", "Le compte a bien été enregistré");
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('personne/signin.html.twig', [
            'form' => $form
        ]);
    }
}
