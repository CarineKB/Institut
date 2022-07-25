<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\PeauRepository;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
   #[Route('/produit/{id<\d+>}', name: 'produit_show')]
    public function show ($id,ProduitRepository $repo){

        $produit = $repo->find($id);
        

        return $this->render("produit/show.html.twig", ['produit'=> $produit]);
    }

      #[Route('/produits', name: 'produit_all')]
      public function all (ProduitRepository $repoPro, CategorieRepository $repoCat){
        $produits= $repoPro->findAll();
        $categories= $repoCat->findAll();
        return $this->render('produit/all.html.twig', ['produits'=> $produits, 'categories'=>$categories]);
    }

   
      #[Route('/categorie-{id<\d+>}', name: 'produits_categorie')]
      public function categorieProduits($id, CategorieRepository $repo){

        $categorie= $repo->find($id);
    
    
        $categories= $repo->findAll();

        return $this->render('produit/all.html.twig', [
        'produits'=>$categorie->getProduits(),
        'categories' => $categories
    ]); 
}
    // #[Route('/produits_type', name: 'produit_type')]
    // public function recupType($id, $peau, ProduitRepository $repoPro, PeauRepository $rePeau){
    //     $produits = $repoPro->find($peau);
    //     if ($produits != null && $produits == $rePeau) {
    //        $produits = $repoPro->find($id);
    //     }
  
    //     return $this->render('home/index.html.twig', ['produit'=>$produits]);
    // }

    }


