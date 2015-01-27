<?php

namespace Gbs\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GbsBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
