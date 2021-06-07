<?php

namespace App\Controller;

use App\Entity\Trash;
use App\Form\TrashType;
use App\Repository\TrashRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrashIndexController extends AbstractController
{
    /**
     * @Route("/", name="trash_index")
     * @param TrashRepository $repository
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function index(TrashRepository $repository, Request $request): Response
    {
        $filters = $request->get('date');
        $date = new \DateTime($filters);
        $type = $request->get('type');

        if ($filters != null) {
            if ($type === "pickup") {
                $trashs = $repository->findBy(["PickupDate" => $date]);
            }else{
                $trashs = $repository->findBy(["CreationDate" =>$date]);
            }
        } else {
            $trashs = $repository->findAll();
        }

        if ($request->get('ajax')) {

            return new JsonResponse([
                'content' => $this->renderView('trash_index/_content.html.twig', [
                    'trashs' => $trashs
                ])
            ]);
        }


        return $this->render('trash_index/index.html.twig', [
            'trashs' => $trashs
        ]);
    }


}
