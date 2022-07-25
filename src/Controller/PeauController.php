<?php

namespace App\Controller;

use App\Entity\Peau;
use App\Form\PeauType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PeauController extends AbstractController
{
    #[Route('/peau', name: 'app_peau')]
    public function index(): Response
    {
        return $this->render('peau/index.html.twig', [
            'controller_name' => 'PeauController',
        ]);
    }

#[Route('/ajout_peau', name: 'ajout_peau')]
public function ajout(Request $request, ManagerRegistry $doctrine): Response
    {
$peau=  new Peau();

$form=$this->createForm(PeauType::class,$peau);
$form->handleRequest($request);

if ($form->isSubmitted() and $form->isValid()){

 $peau->getType($request);
    $manager= $doctrine->getManager();
    $manager->persist($peau);
    $manager->flush();

return $this->redirectToRoute('ajout_peau');
}
    return $this->render('peau/formPeau.html.twig', ['formPeau'=>$form-> createView()]);
    
}

      
        
    

    


}
