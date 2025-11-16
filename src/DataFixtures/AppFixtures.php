<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // 1. Super Admin
        $superAdmin = new User();
        $superAdmin->setEmail('superadmin@inventotrack.com');
        $superAdmin->setFirstName('Super');
        $superAdmin->setLastName('Admin');
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN']);
        $superAdmin->setIsActive(true);
        $hashedPassword = $this->passwordHasher->hashPassword($superAdmin, 'password');
        $superAdmin->setPassword($hashedPassword);
        $manager->persist($superAdmin);

        // // 2. Admin
        // $admin = new User();
        // $admin->setEmail('admin@inventotrack.com');
        // $admin->setFirstName('John');
        // $admin->setLastName('Admin');
        // $admin->setRoles(['ROLE_ADMIN']);
        // $admin->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($admin, 'password');
        // $admin->setPassword($hashedPassword);
        // $manager->persist($admin);

        // // 3. Manager
        // $manager1 = new User();
        // $manager1->setEmail('manager@inventotrack.com');
        // $manager1->setFirstName('Sarah');
        // $manager1->setLastName('Manager');
        // $manager1->setRoles(['ROLE_MANAGER']);
        // $manager1->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($manager1, 'password');
        // $manager1->setPassword($hashedPassword);
        // $manager->persist($manager1);

        // // 4. Employee
        // $employee = new User();
        // $employee->setEmail('employee@inventotrack.com');
        // $employee->setFirstName('Mike');
        // $employee->setLastName('Employee');
        // $employee->setRoles(['ROLE_EMPLOYEE']);
        // $employee->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($employee, 'password');
        // $employee->setPassword($hashedPassword);
        // $manager->persist($employee);

        // // 5. User simple (ROLE_USER seulement)
        // $user = new User();
        // $user->setEmail('user@inventotrack.com');
        // $user->setFirstName('Basic');
        // $user->setLastName('User');
        // $user->setRoles(['ROLE_USER']);
        // $user->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($user, 'password');
        // $user->setPassword($hashedPassword);
        // $manager->persist($user);

        // // 6. Super Admin supplémentaire pour les tests
        // $superAdmin2 = new User();
        // $superAdmin2->setEmail('platform@inventotrack.com');
        // $superAdmin2->setFirstName('Platform');
        // $superAdmin2->setLastName('Administrator');
        // $superAdmin2->setRoles(['ROLE_SUPER_ADMIN']);
        // $superAdmin2->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($superAdmin2, 'password');
        // $superAdmin2->setPassword($hashedPassword);
        // $manager->persist($superAdmin2);

        // // 7. Admin supplémentaire
        // $admin2 = new User();
        // $admin2->setEmail('admin2@inventotrack.com');
        // $admin2->setFirstName('Jane');
        // $admin2->setLastName('Administrator');
        // $admin2->setRoles(['ROLE_ADMIN']);
        // $admin2->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($admin2, 'password');
        // $admin2->setPassword($hashedPassword);
        // $manager->persist($admin2);

        // // 8. Manager supplémentaire
        // $manager2 = new User();
        // $manager2->setEmail('manager2@inventotrack.com');
        // $manager2->setFirstName('Robert');
        // $manager2->setLastName('Smith');
        // $manager2->setRoles(['ROLE_MANAGER']);
        // $manager2->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($manager2, 'password');
        // $manager2->setPassword($hashedPassword);
        // $manager->persist($manager2);

        // // 9. Employee supplémentaire
        // $employee2 = new User();
        // $employee2->setEmail('employee2@inventotrack.com');
        // $employee2->setFirstName('Emma');
        // $employee2->setLastName('Johnson');
        // $employee2->setRoles(['ROLE_EMPLOYEE']);
        // $employee2->setIsActive(true);
        // $hashedPassword = $this->passwordHasher->hashPassword($employee2, 'password');
        // $employee2->setPassword($hashedPassword);
        // $manager->persist($employee2);

        // // 10. User inactif pour tester
        // $inactiveUser = new User();
        // $inactiveUser->setEmail('inactive@inventotrack.com');
        // $inactiveUser->setFirstName('Inactive');
        // $inactiveUser->setLastName('User');
        // $inactiveUser->setRoles(['ROLE_USER']);
        // $inactiveUser->setIsActive(false);
        // $hashedPassword = $this->passwordHasher->hashPassword($inactiveUser, 'password');
        // $inactiveUser->setPassword($hashedPassword);
        // $manager->persist($inactiveUser);

        // Sauvegarder
        $manager->flush();
    }
}