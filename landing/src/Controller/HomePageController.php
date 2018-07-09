<?php

namespace App\Controller;

use App\Entity\HomePage;
use App\Form\HomePageType;
use App\Repository\HomePageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomePageController extends Controller
{
    /**
     * @Route("/", name="home_page_index", methods="GET")
     */
    public function index(HomePageRepository $homePageRepository): Response
    {
        return $this->render('home_page/index.html.twig');
    }

    /**
     * @Route("/new", name="home_page_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $homePage = new HomePage();
        $form = $this->createForm(HomePageType::class, $homePage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($homePage);
            $em->flush();

            return $this->redirectToRoute('home_page_index');
        }

        return $this->render('home_page/new.html.twig', [
            'home_page' => $homePage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="home_page_show", methods="GET")
     */
    public function show(HomePage $homePage): Response
    {
        return $this->render('home_page/show.html.twig', ['home_page' => $homePage]);
    }

    /**
     * @Route("/{id}/edit", name="home_page_edit", methods="GET|POST")
     */
    public function edit(Request $request, HomePage $homePage): Response
    {
        $form = $this->createForm(HomePageType::class, $homePage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home_page_edit', ['id' => $homePage->getId()]);
        }

        return $this->render('home_page/edit.html.twig', [
            'home_page' => $homePage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="home_page_delete", methods="DELETE")
     */
    public function delete(Request $request, HomePage $homePage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$homePage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($homePage);
            $em->flush();
        }

        return $this->redirectToRoute('home_page_index');
    }
}
