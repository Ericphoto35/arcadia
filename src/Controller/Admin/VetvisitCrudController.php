<?php

namespace App\Controller\Admin;

use App\Entity\Vetvisit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VetvisitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vetvisit::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
         ->setPermission(Action::DELETE, 'ROLE_VETO');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('vetvisitedate'),
            TextField::new('food'),
            NumberField::new('quantite'),
            TextEditorField::new('etat'),
            AssociationField::new('vetvisitanimal'),
            

        ];
    }
}
