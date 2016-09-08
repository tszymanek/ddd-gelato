<?php

namespace AppBundle\Controller;

use Gelato\Production\Domain\Model\Craftsman\CraftsmanId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
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

        if($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();
            //identity check
            $craftsman = $this
                ->get('craftsman_repository_doctrine')
                ->find(new CraftsmanId($request->request->get('id')));

            $flavor = $craftsman->provideFlavor($data['name']);
            $flavorRepository = $this->get('flavor_repository_doctrine');
            $dbflavor = $this->get('flavor_repository_doctrine')->ofName($flavor->name());
            if ($dbflavor) {
                throw new \Exception();
            }

            $flavorRepository->add($flavor);

        return new Response();
        }

        return new Response();
    }

}