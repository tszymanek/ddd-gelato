<?php

namespace AppBundle\Controller;

use AppBundle\Form\FlavorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FlavorController
 * @package AppBundle\Controller
 *
 * @Route("/flavor")
 */
class FlavorController extends Controller
{
    /**
     * @Route("/new", name="add_flavor")
     * @param Request $request
     */
    public function createFlavorAction(Request $request)
    {
        $form = $this->createForm(FlavorType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $createFlavorService = $this->get('create_flavor_service');

            $response = $createFlavorService->execute($data);
        }

        return $this->render(
            '@Gelato/Production/UI/Twig/Gelato/newFlavor.html.twig', [
                'form' => $form->createView()
            ]
        );
    }

}
