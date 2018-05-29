<?php

namespace App\Controller;

use App\Entity\ActContact;
use App\Form\ActContactType;
use App\Repository\ActContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/act/contact")
 */
class ActContactController extends Controller
{
    /**
     * @Route("/", name="act_contact_index", methods="GET")
     */
    public function index(ActContactRepository $actContactRepository): Response
    {
        return $this->render('act_contact/index.html.twig', ['act_contacts' => $actContactRepository->findAll()]);
    }

    /**
     * @Route("/new", name="act_contact_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $actContact = new ActContact();
        $form = $this->createForm(ActContactType::class, $actContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actContact);
            $em->flush();

            return $this->redirectToRoute('act_contact_index');
        }

        return $this->render('act_contact/new.html.twig', [
            'act_contact' => $actContact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_contact_show", methods="GET")
     */
    public function show(ActContact $actContact): Response
    {
        return $this->render('act_contact/show.html.twig', ['act_contact' => $actContact]);
    }

    /**
     * @Route("/{id}/edit", name="act_contact_edit", methods="GET|POST")
     */
    public function edit(Request $request, ActContact $actContact): Response
    {
        $form = $this->createForm(ActContactType::class, $actContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('act_contact_edit', ['id' => $actContact->getId()]);
        }

        return $this->render('act_contact/edit.html.twig', [
            'act_contact' => $actContact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_contact_delete", methods="DELETE")
     */
    public function delete(Request $request, ActContact $actContact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actContact->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actContact);
            $em->flush();
        }

        return $this->redirectToRoute('act_contact_index');
    }
}
