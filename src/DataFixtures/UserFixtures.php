<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('k.konwinski@onet.pl');
        $user->setRoles(['ROLE_ADMIN']);
        $password = $this->encoder->hashPassword($user, '12345');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
