<?php

namespace App\Controller\Admin;

use App\Entity\HorairesZoo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class HorairesZooCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HorairesZoo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('debut'),
            IntegerField::new('fin'),
        ];
    }
}
