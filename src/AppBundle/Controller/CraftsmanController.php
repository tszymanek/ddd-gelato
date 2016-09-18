<?php

namespace AppBundle\Controller;

use AppBundle\Form\CraftsmanType;
use Gelato\Production\Application\Service\Gelato\ProduceGelatoRequest;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanDoesNotExistException;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;
use AppBundle\Form\GelatoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CraftsmanController
 * @package AppBundle\Controller
 *
 * @Route("/craftsman")
 */
class CraftsmanController extends Controller
{
    /**
     * @Route("/create", name="craftsman_create")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function createCraftsmanAction(Request $request)
    {
        $form = $this->createForm(CraftsmanType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $createCraftsmanService = $this->get('create_craftsman_service');

            $response = $createCraftsmanService->execute($data);

            return $this->redirect($this->generateUrl('craftsman_show', ['id' => $response['id']]));
        }

        return $this->render(
            '@Gelato/Production/UI/Twig/Craftsman/new.html.twig', array(
                'form'   => $form->createView()
            )
        );
    }

    /**
     * @Route("/{id}", name="craftsman_show")
     *
     * @param $id
     * @return Response
     */
    public function showCraftsmanAction($id)
    {
        $craftsmanRepository = $this->get('craftsman_repository_doctrine');

        $craftsman = $craftsmanRepository->ofId(new CraftsmanId($id));
        if (!$craftsman) {
            throw new CraftsmanDoesNotExistException();
        }

        return $this->render(
            '@Gelato/Production/UI/Twig/Craftsman/show.html.twig', [
                'craftsman' => $craftsman
            ]
        );
    }


    /**
     * @Route("/{id}/gelato/create", name="gelato_create")
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function createGelatoAction(Request $request, $id)
    {
        $flavors = $this->get('flavor_repository_doctrine')->all();
        $form = $this->createForm(GelatoType::class, null, ['flavors' => $flavors]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $produceGelatoService = $this->get('produce_gelato_service');

            $response = $produceGelatoService->execute(
                new ProduceGelatoRequest($data->flavor(), $id)
            );
        }

        return $this->render(
            '@Gelato/Production/UI/Twig/Gelato/newGelato.html.twig', [
                'form' => $form->createView()
            ]
        );
    }
}
