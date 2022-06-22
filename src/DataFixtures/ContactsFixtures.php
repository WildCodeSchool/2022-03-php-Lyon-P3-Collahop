<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactsFixtures extends Fixture
{
    public const CONTACTS = [
        [
            'firstname' => 'firstname 1',
            'lastname' => 'lastname 1',
            'company' => 'company 1',
            'email' => 'email1@email1.com',
            'message' => 'message 1',
        ],
        [
            'firstname' => 'firstname 2',
            'lastname' => 'lastname 2',
            'company' => 'company 2',
            'email' => 'email2@email2.com',
            'message' => 'message 2',
        ],
        [
            'firstname' => 'firstname 3',
            'lastname' => 'lastname 3',
            'company' => 'company 3',
            'email' => 'email3@email3.com',
            'message' => 'message 3',
        ],
        [
            'firstname' => 'firstname 4',
            'lastname' => 'lastname 4',
            'company' => 'company 4',
            'email' => 'email4@email4.com',
            'message' => 'message 4',
        ],
        [
            'firstname' => 'firstname 5',
            'lastname' => 'lastname 5',
            'company' => 'company 5',
            'email' => 'email5@email5.com',
            'message' => 'message 5',
        ],
        [
            'firstname' => 'firstname 6',
            'lastname' => 'lastname 6',
            'company' => 'company 6',
            'email' => 'email6@email6.com',
            'message' => 'message 6',
        ],
        [
            'firstname' => 'firstname 7',
            'lastname' => 'lastname 7',
            'company' => 'company 7',
            'email' => 'email7@email7.com',
            'message' => 'message 7',
        ],
        [
            'firstname' => 'firstname 8',
            'lastname' => 'lastname 8',
            'company' => 'company 8',
            'email' => 'email8@email8.com',
            'message' => 'message 8',
        ],
        [
            'firstname' => 'firstname 9',
            'lastname' => 'lastname 9',
            'company' => 'company 9',
            'email' => 'email9@email9.com',
            'message' => 'message 9',
        ],
        [
            'firstname' => 'firstname 10',
            'lastname' => 'lastname 10',
            'company' => 'company 10',
            'email' => 'email10@email10.com',
            'message' => 'message 10',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        $iii = 1;
        foreach (self::CONTACTS as $dataContact) {
            $contact = new Contact();
            $contact
                ->setFirstname($dataContact['firstname'])
                ->setLastname($dataContact['lastname'])
                ->setCompany($dataContact['company'])
                ->setEmail($dataContact['email'])
                ->setMessage($dataContact['message'])
            ;

            $manager->persist($contact);
            $this->addReference('contact_' . $iii, $contact);
            $iii++;
        }

        $manager->flush();
    }
}
