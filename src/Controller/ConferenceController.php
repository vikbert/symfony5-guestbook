<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $greet = '';
        if ($name = $request->query->get('hello')) {
            $greet = sprintf('hello, %s', htmlspecialchars($name));
        }

        return $this->render('conference/index.html.twig', [
            'controller_name' => 'ConferenceController',
            'greet' => $greet
        ]);
    }
}
