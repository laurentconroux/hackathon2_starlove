<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\Characters;
use GuzzleHttp\Client;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/profile.html.twig');
    }

    /**
     * @Route("/choices", name="choices")
     */
    public function choicesAction(Request $request)
    {
        $allCharacters = new Characters();
        $characters = $allCharacters->getAll();
    
        return $this->render('default/choices.html.twig', [
            'characters' => $characters,
        ]);
    }
/*
    /**
     * @Route("/matches", name="matches")
     */
/*
    public function matchesAction( Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('default/matches.html.twig');
    }*/

    /**
     * @Route("/matches/{id}", name="matches", requirements={"\d+"})
     */
    public function matchesAction($id, Request $request)
    {
        $charactersManager = new Characters();
        $character = $charactersManager->getOneByID($id);


        // replace this example code with whatever you need
        return $this->render('default/matches.html.twig',[
            'character' => $character]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        $charactersManager = new Characters();
        $allCharacters = $charactersManager->getAll();
        $empireCharacters = $charactersManager->getExtractByAffiliation($allCharacters,'Republic');
        $republicCharacters = $charactersManager->getExtractByParameterAndValue($allCharacters, 'affiliations','Empire');

        return $this->render('default/test.html.twig', [
            'characters' => $republicCharacters,
        ]);
    }

}
