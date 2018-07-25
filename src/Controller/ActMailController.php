<?php

namespace App\Controller;

use App\Entity\ActMail;
use App\Form\ActMailType;
use App\Repository\ActMailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/act/mail")
 */
class ActMailController extends Controller
{
    /**
     * @Route("/", name="act_mail_index", methods="GET")
     */
    public function index(ActMailRepository $actMailRepository): Response
    {
        return $this->render('act_mail/index.html.twig', ['act_mails' => $actMailRepository->findAll()]);
    }

    /**
     * @Route("/new", name="act_mail_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $actMail = new ActMail();
        $form = $this->createForm(ActMailType::class, $actMail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actMail);
            $em->flush();

            return $this->redirectToRoute('act_mail_index');
        }

        return $this->render('act_mail/new.html.twig', [
            'act_mail' => $actMail,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_mail_show", methods="GET")
     */
    public function show(ActMail $actMail): Response
    {
        return $this->render('act_mail/show.html.twig', ['act_mail' => $actMail]);
    }

    /**
     * @Route("/{id}/edit", name="act_mail_edit", methods="GET|POST")
     */
    public function edit(Request $request, ActMail $actMail): Response
    {
        $form = $this->createForm(ActMailType::class, $actMail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('act_mail_edit', ['id' => $actMail->getId()]);
        }

        return $this->render('act_mail/edit.html.twig', [
            'act_mail' => $actMail,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_mail_delete", methods="DELETE")
     */
    public function delete(Request $request, ActMail $actMail): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actMail->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actMail);
            $em->flush();
        }

        return $this->redirectToRoute('act_mail_index');
    }
}
