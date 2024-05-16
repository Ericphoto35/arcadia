<?php

namespace App\Controller\Admin;

use App\Entity\EspaceEmploye;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EspaceEmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EspaceEmploye::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
         ->setPermission(Action::DELETE, 'ROLE_SUPER_ADMIN');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('empvisite'),
            NumberField::new('empquantite'),
            TextField::new('empfood'),
            AssociationField::new('empanimal'),
        ];
    }
}