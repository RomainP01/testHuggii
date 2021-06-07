<?php

namespace App\Controller;

use App\Repository\TrashRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Dompdf\Dompdf;
use Dompdf\Options;

class PDFTrashController extends AbstractController
{
    /**
     * @Route("/pdf", name="pdf_trash")
     */
    public function index(TrashRepository $repository): Response

    {
        $id = $_GET["id"];
        $trash = $repository->findBy(["id"=>$id]);
        $trashtype = $trash[0]->getTrashType();
        $type = $trash[0]->getType();

        return $this->render('pdf_trash/index.html.twig', [
            'controller_name' => 'PDFTrashController',
            "trash" => $trash,
            "type" => $type
        ]);
    }

    /**
     * @Route("/pdf/download", name="pdf_trash_download")
     */
    public function pdf(TrashRepository $repository) {
        $id = $_GET["id"];
        $trash = $repository->findBy(["id"=>$id]);
        $trashtype = $trash[0]->getTrashType();
        $type = $trash[0]->getType();

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($pdfOptions);

        $html = $this->renderView('pdf.html.twig', [
            'id' => $trash[0]->getId(),
            'dateC' => $trash[0]->getCreationDate(),
            'nom' => $trash[0]->getName(),
            'type' =>$type,
            'dateE' => $trash[0]->getPickupDate()

        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream($trash[0]->getName().".pdf", [
            "Attachment" => true
        ]);
    }
}
