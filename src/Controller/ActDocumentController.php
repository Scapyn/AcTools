<?php

namespace App\Controller;

use App\Entity\ActDocument;
use App\Form\ActDocumentType;
use App\Repository\ActDocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/act/document")
 */
class ActDocumentController extends Controller
{
    /**
     * @Route("/", name="act_document_index", methods="GET")
     */
    public function index(ActDocumentRepository $actDocumentRepository): Response
    {
        return $this->render('act_document/index.html.twig', ['act_documents' => $actDocumentRepository->findAll()]);
    }

    /**
     * @Route("/new", name="act_document_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $actDocument = new ActDocument();
        $form = $this->createForm(ActDocumentType::class, $actDocument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actDocument);
            $em->flush();

            return $this->redirectToRoute('act_document_index');
        }

        return $this->render('act_document/new.html.twig', [
            'act_document' => $actDocument,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_document_show", methods="GET")
     */
    public function show(ActDocument $actDocument): Response
    {
        return $this->render('act_document/show.html.twig', ['act_document' => $actDocument]);
    }

    /**
     * @Route("/{id}/edit", name="act_document_edit", methods="GET|POST")
     */
    public function edit(Request $request, ActDocument $actDocument): Response
    {
        $form = $this->createForm(ActDocumentType::class, $actDocument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('act_document_edit', ['id' => $actDocument->getId()]);
        }

        return $this->render('act_document/edit.html.twig', [
            'act_document' => $actDocument,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_document_delete", methods="DELETE")
     */
    public function delete(Request $request, ActDocument $actDocument): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actDocument->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actDocument);
            $em->flush();
        }

        return $this->redirectToRoute('act_document_index');
    }
}
