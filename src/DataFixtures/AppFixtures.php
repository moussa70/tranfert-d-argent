<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('adminSysteme');
        $user->setNomComplet('moussa');
        $user->setisActif('true');
        $user->setPassword($this->encoder->encodePassword($user, "passer_123"));
        $user->setRoles(["ROLE_SUPER_ADMIN"]);
       $manager->persist($user);
        $manager->flush();
    }
}
