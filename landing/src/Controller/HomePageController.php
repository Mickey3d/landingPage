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
        return $this->render('home_page/index.html.twig', [
          'homepage' => $homePageRepository->findOneByConfigName('default')
        ]);
    }


    /**
     * @Route("/admin/homepage/index", name="home_page_index_admin", methods="GET")
     */
    public function indexAdmin(HomePageRepository $homePageRepository): Response
    {
        return $this->render('home_page/admin/index.html.twig', [
          'homepage' => $homePageRepository->findOneByConfigName('default')
        ]);
    }

    /**
     * @Route("/admin/homepage/new", name="home_page_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $homePage = new HomePage();
        $homePage->setSiteName('Hello');
        $homePage->setCopyrightName('John Doe');
        $homePage->setCopyrightYear('2018');
        $homePage->setConfigName('default');

        $em = $this->getDoctrine()->getManager();
        $em->persist($homePage);
        $em->flush();
        $this->addFlash('success','The HomePage have been created!');

        return $this->redirectToRoute('home_page_edit', ['id' => $homePage->getId()]);

    }

    /**
     * @Route("/admin/homepage/{id}", name="home_page_show", methods="GET")
     */
    public function show(HomePage $homePage): Response
    {
        return $this->render('home_page/admin/action/show.html.twig', ['home_page' => $homePage]);
    }

    /**
     * @Route("/admin/homepage/{id}/edit", name="home_page_edit", methods="GET|POST")
     */
    public function edit(Request $request, HomePage $homePage): Response
    {
        $form = $this->createForm(HomePageType::class, $homePage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success','The HomePage have been updated!');

            return $this->redirectToRoute('home_page_edit', ['id' => $homePage->getId()]);
        }

        return $this->render('home_page/admin/action/edit.html.twig', [
            'home_page' => $homePage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/homepage/{id}", name="home_page_delete", methods="DELETE")
     */
    public function delete(Request $request, HomePage $homePage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$homePage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($homePage);
            $em->flush();
            $this->addFlash('success','The HomePage have been deleted!');
        }

        return $this->redirectToRoute('home_page_index_admin');
    }
}
