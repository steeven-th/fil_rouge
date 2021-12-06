<?php

namespace App\Controller\Front;

use App\Entity\Parents;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Contracts\Translation\TranslatorInterface;

class IndexController extends AbstractController {
    private $security;

    public function __construct(Security $security) {
        $this->security = $security;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(TranslatorInterface $translator): Response {

        //$this->denyAccessUnlessGranted('ROLE_USER');

        //$this->addFlash('success', $translator->trans('Your email address has been verified.', array(), 'email'));

        return $this->render('front/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/my-account", name="my_account")
     */
    public function myAccount(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, TranslatorInterface $translator): Response {

        if (!$this->isGranted('ROLE_USER')) {

            $this->addFlash('error', $translator->trans('You do not have permission to access this content', array(), 'security'));

            return $this->redirectToRoute('index');
        }

        $user = $this->security->getUser();

        $userUpdate = new Parents();

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

//            $user->setSharecode(
//                $userPasswordHasher->hashPassword(
//                    $user,
//                    $form->get('shareCode')->getData()
//                )
//            );

            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            // substitute the previous line (redirect response) with this one.
//            return $authenticator->authenticateUser(
//                $user,
//                $formAuthenticator,
//                $request);

            //return $this->redirectToRoute('index');
        }

        //dd($user);

        $userInfos = $this->getDoctrine()->getRepository(Parents::class)->findOneBy(
            ['email' => $user->getUserIdentifier()]
        );

        //dd($userInfos);

        return $this->render('front/account/index.html.twig', [
            'controller_name' => 'IndexController',
            'userInfos' => $userInfos,
            'registrationForm' => $form->createView(),
        ]);
    }
}
