<?php

namespace App\Controller;

use App\Entity\Trash;
use App\Form\TrashType;
use App\Repository\TrashRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrashCreationController extends AbstractController
{

    /**
     * @var TrashRepository
     */

    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(TrashRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/create", name="trash_creation")
     */
    public function index(Request $request): Response
    {
        $trash = new Trash();
        $form = $this->createForm(TrashType::class, $trash);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($trash);
            $this->em->flush();
            return $this->redirectToRoute('trash_index');
        }
        return $this->render('trash_creation/index.html.twig', [

            'form' => $form->createView()
        ]);
    }


}
