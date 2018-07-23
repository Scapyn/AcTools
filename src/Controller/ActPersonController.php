<?php

namespace App\Controller;

use App\Entity\ActPerson;
//use App\Form\ActPerson1Type;
use App\Form\ActPersonType;
use App\Repository\ActPersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/act/person")
 */
class ActPersonController extends Controller
{
    /**
     * @Route("/", name="act_person_index", methods="GET")
     */
    public function index(ActPersonRepository $actPersonRepository): Response
    {
        return $this->render('act_person/index.html.twig', ['act_people' => $actPersonRepository->findAll()]);
    }

    /**
     * @Route("/new", name="act_person_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $actPerson = new ActPerson();
        $form = $this->createForm(ActPersonType::class, $actPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actPerson);
            $em->flush();

            return $this->redirectToRoute('act_person_index');
        }

        return $this->render('act_person/new.html.twig', [
            'act_person' => $actPerson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_person_show", methods="GET")
     */
    public function show(ActPerson $actPerson): Response
    {
        return $this->render('act_person/show.html.twig', ['act_person' => $actPerson]);
    }

    /**
     * @Route("/{id}/edit", name="act_person_edit", methods="GET|POST")
     */
    public function edit(Request $request, ActPerson $actPerson): Response
    {
        // $form = $this->createForm(ActPersonType::class, $actPerson);
        $form = $this->createForm(ActPersonType::class, $actPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('act_person_edit', ['id' => $actPerson->getId()]);
        }

        return $this->render('act_person/edit.html.twig', [
            'act_person' => $actPerson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="act_person_delete", methods="DELETE")
     */
    public function delete(Request $request, ActPerson $actPerson): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actPerson->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actPerson);
            $em->flush();
        }

        return $this->redirectToRoute('act_person_index');
    }
}
