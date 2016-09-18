<?php

namespace AppBundle\Controller;

use Gelato\Production\Domain\Model\Gelato\GelatoDoesNotExistException;
use Gelato\Production\Domain\Model\Gelato\GelatoId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GelatoController
 * @package AppBundle\Controller
 *
 * @Route("/gelato")
 */
class GelatoController extends Controller
{
    /**
     * @Route("/", name="gelatos_index")
     */
    public function indexAction()
    {
        $viewGelatosService = $this->get('view_gelatos_service');

        $response = $viewGelatosService->execute();

        return $this->render(
            '@Gelato/Production/UI/Twig/Gelato/index.html.twig', array(
                'gelatos' => $response
            )
        );
    }

    /**
     * @Route("/{id}", name="gelato_show")
     *
     * @param Request $request
     * @param $id
     */
    public function showAction($id)
    {
        $gelatoRepository = $this->get('gelato_repository_doctrine');

        $gelato = $gelatoRepository->ofId(new GelatoId($id));

        if (!$gelato) {
            throw new GelatoDoesNotExistException();
        }

        return $this->render(
            '@Gelato/Production/UI/Twig/Gelato/show.html.twig', array(
                'gelato' => $gelato
            )
        );
    }
}