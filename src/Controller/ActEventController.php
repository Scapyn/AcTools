<?php

namespace App\Controller;

use App\Entity\ActEvent;
use App\Form\ActEventType;
use App\Repository\ActEventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/act/event")
 */
class ActEventController extends Controller
{
    /**
     * @Route("/", name="act_event_index", methods="GET")
     */
    public function index(ActEventRepository $actEventRepository): Response
    {
        return $this->render('act_event/index.html.twig', ['act_events' => $actEventRepository->findAll()]);
    }

    /**
     * @Route("/new", name="act_event_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $actEvent = new ActEvent();
        $form = $this->createForm(ActEventType::class, $actEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actEvent);
            $em->flush();

            return $this->redirectToRoute('act_event_index');
        }

        return $this->render('act_event/new.html.twig', [
            'act_event' => $actEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_event_show", methods="GET")
     */
    public function show(ActEvent $actEvent): Response
    {
        return $this->render('act_event/show.html.twig', ['act_event' => $actEvent]);
    }

    /**
     * @Route("/{id}/edit", name="act_event_edit", methods="GET|POST")
     */
    public function edit(Request $request, ActEvent $actEvent): Response
    {
        $form = $this->createForm(ActEventType::class, $actEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('act_event_edit', ['id' => $actEvent->getId()]);
        }

        return $this->render('act_event/edit.html.twig', [
            'act_event' => $actEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_event_delete", methods="DELETE")
     */
    public function delete(Request $request, ActEvent $actEvent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actEvent->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actEvent);
            $em->flush();
        }

        return $this->redirectToRoute('act_event_index');
    }
}
