<?php

namespace App\Controller;

use App\Entity\Qr;
use App\Entity\QrRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QrController extends AbstractController
{
    #[Route('/{id}', name: 'app_qr_show', methods: [Request::METHOD_GET])]
    public function show(Qr $qr, EntityManagerInterface $manager): Response
    {
        $request = new QrRequest($qr);
        $manager->persist($request);
        $manager->flush();

        return new RedirectResponse($qr->getUrl());
    }
}
