<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Comment;
use App\Entity\Conference;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixtures extends Fixture
{
    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }
    
    public function load(ObjectManager $manager)
    {
        $berlin = new Conference();
        $berlin->setCity('Berlin');
        $berlin->setYear('2018');
        $berlin->setIsInternational(true);
        $manager->persist($berlin);

        $london = new Conference();
        $london->setCity('London');
        $london->setYear('2019');
        $london->setIsInternational(true);
        $manager->persist($london);

        $comm1 = new Comment();
        $comm1->setConference($berlin);
        $comm1->setAuthor('Fabien');
        $comm1->setEmail('fabien@example.com');
        $comm1->setText('this was a great conference.');
        $comm1->setState('published');
        $manager->persist($comm1);

        // admin user
        $admin = new Admin();
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setUsername('admin');
        $admin->setPassword($this->encoderFactory->getEncoder(Admin::class)->encodePassword('admin', null));
        $manager->persist($admin);
        
        $manager->flush();
    }
}
