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
        $user->setUsername('supadmin');
        $user->setNomcomplet('moussa');
        $user->setIsActif('true');
        $user->setPassword($this->encoder->encodePassword($user, "passer"));
        $user->setRoles(["ROLE_".$role->getLibelle()]);
        $manager->persist($role);
        $user->setRole($role);
        $manager->persist($user);
        
    
    $role1 = new Role();
    $role1->setLibelle("ADMIN");
    $manager->persist($role1);
    $user1 = new User();
    $user1->setUsername('admin');
    $user1->setNomcomplet('ousseynou');
    $user1->setIsActif('true');
    $user1->setPassword($this->encoder->encodePassword($user1, "passer_123"));
    $user1->setRoles(["ROLE_".$role1->getLibelle()]);
    $manager->persist($role1);
    $user1->setRole($role1);
    $manager->persist($user1);
    

$role2 = new Role();
$role2->setLibelle("CAISSIER");
$manager->persist($role2);
$user2 = new User();
$user2->setUsername('caissier');
$user2->setNomcomplet('moussa');
$user2->setIsActif('true');
$user2->setPassword($this->encoder->encodePassword($user2, "passer_123"));
$user2->setRoles(["ROLE_".$role2->getLibelle()]);
$manager->persist($role2);
$user2->setRole($role2);
$manager->persist($user2);

$manager->flush();

}
}
