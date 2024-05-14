<?php

namespace App\Controller\Admin;

use App\Entity\AvisVisiteurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AvisVisiteursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AvisVisiteurs::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('Prenom'),
            TextField::new('Petitmot'),
            ChoiceField::new('publication')
                ->setChoices([
                    'Publié' => 'publié',
                    'Attente' => 'attente',
                    'Rejeté' => 'rejeté',
                ]),
        ];    
    }
}
