<?php

namespace App\DataFixtures;

use App\Entity\Role;
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
        $role = new Role();
        $role->setLibelle("SUP_ADMIN");
        $manager->persist($role);
        $user = new User();
        $user->setUsername('admin');
        $user->setNomcomplet('zeyna');
        $user->setIsActif('true');
        $user->setPassword($this->encoder->encodePassword($user, "passer_123"));
        $user->setRoles(["ROLE_".$role->getLibelle()]);
        $manager->persist($role);
        $user->setRole($role);
        $manager->persist($user);
        $manager->flush();
    }
}
