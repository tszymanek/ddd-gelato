<?php

namespace AppBundle\Controller;

use AppBundle\Form\CraftsmanType;
use Gelato\Production\Application\DataTransformer\Craftsman\CraftsmanDTODataTransformer;
use Gelato\Production\Application\Service\Craftsman\CreateCraftsmanRequest;
use Gelato\Production\Application\Service\Craftsman\CreateCraftsmanService;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanDoesNotExistsException;
use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;
use Gelato\Production\Domain\Model\Gelato\GelatoId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
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
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/create", name="craftsman_create")
     * @param Request $request
     */
    public function createCraftsmanAction(Request $request)
    {
        $form = $this->createForm(CraftsmanType::class);
//        $createCraftsmanRequest = new CreateCraftsmanRequest(
//            $request->get('firstName'),
//            $request->get('lastName')
//        );
//
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
     * @param $id
     */
    public function showCraftsmanAction($id)
    {
        $craftsmanRepository = $this->get('craftsman_repository_doctrine');

        $craftsman = $craftsmanRepository->ofId(new CraftsmanId($id));
        if (!$craftsman) {
           throw new CraftsmanDoesNotExistsException();
        }

        return $this->render(
            '@Gelato/Production/UI/Twig/Craftsman/show.html.twig', [
                'craftsman' => $craftsman
            ]
        );
    }
}
