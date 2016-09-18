<?php

namespace AppBundle\Controller;

use AppBundle\Form\FreezerType;
use Gelato\Sale\Domain\Model\Freezer\FreezerId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FreezerController
 * @package AppBundle\Controller
 *
 * @Route("/freezer")
 */
class FreezerController extends Controller
{
    /**
     * @Route("/create", name="create_freezer")
     * @param Request $request
     */
    public function createFreezerAction(Request $request)
    {
        $freezerTypes = $this->get('freezer_type_repository_doctrine')->all();
        $form = $this->createForm(FreezerType::class, null, ['types' => $freezerTypes]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $createFreezerService = $this->get('create_freezer_service');

            $response = $createFreezerService->execute($data);

            return $this->redirect($this->generateUrl('freezer_show', ['id' => $response['id']]));
        }

        return $this->render(
            '@Gelato/Sale/UI/Twig/Freezer/new.html.twig', array(
                'form'   => $form->createView()
            )
        );
    }

    /**
     * @Route("/{id}", name="freezer_show")
     * @param $id
     */
    public function showFreezerAction($id)
    {
        $freezerRepository = $this->get('freezer_repository_doctrine');

        $freezer = $freezerRepository->ofId(new FreezerId($id));
        if (!$freezer) {
            throw new FreezerDoesNotExistsException();
        }

        return $this->render(
            '@Gelato/Sale/UI/Twig/Freezer/show.html.twig', [
                'freezer' => $freezer
            ]
        );
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function storeGelatoAction(Request $request, $id)
    {

    }
}