<?php

namespace KuKu\UserBundle\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    public function index(
        // UserRepository $userRepository,
        // Request $request
    )
    {
        // return $this->json(['hey' => 'ho']);
        // return $this->render('user/index.html.twig');
        return $this->render('@KuKuUser/user/index.html.twig');
    }
}
