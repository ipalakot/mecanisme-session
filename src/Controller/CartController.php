<?php

namespace App\Controller;

use App\Entity\Product;

use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index()
    {
        return $this->render('cart/index.html.twig', []);
    }

    /**
     * @Route("/panier/add/{id}", name="card_add")
     * 
     */
    public function add($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if( !empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }
        $session->set('panier', $panier);
        dd($session->get('panier')); 
        
    }
}
