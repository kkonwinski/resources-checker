<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('k.konwinski@onet.pl');
        $user->setRoles(['ROLE_ADMIN']);
        $password = $this->encoder->encodePassword($user, '12345');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
