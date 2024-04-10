<?php

namespace App\Controller;

use App\Entity\Meeting;
// use App\Form\TeamType;
use App\Repository\MeetingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetingController extends AbstractController
{
    #[Route('/meeting', name: 'app_meeting')]
    public function index(MeetingRepository $meetingRepository): Response
    {
        $meetings = $meetingRepository->findAll();

        return $this->render('meeting/index.html.twig', [
            'meetings' => $meetings,
            'nbrMeetings' => count($meetings),
        ]);
    }

    // #[Route('/meeting/new', name: 'app_meeting_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $team = new Meeting();
    //     $form = $this->createForm(TeamType::class, $team);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($team);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_team');
    //     }

    //     return $this->render('team/new.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }



    // #[Route('/team/{id}/delete', name: 'app_team_delete', methods: ['GET', 'POST'])]
    // public function delete(Team $team, Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('remove-team-'.$team->getId(), $request->get('_token'))) {
    //         $entityManager->remove($team);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_team');
    // }

    // #[Route('/team/{id}/update', name:'app_team_update', methods: ['GET', 'POST'])]
    // public function update(Team $team, Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(TeamType::class, $team);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($team);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_team');
    //     }
        
    //     return $this->render('team/update.html.twig', [
    //         'team' => $team,
    //         'form' => $form->createView(),
    //     ]);
    // }
}
