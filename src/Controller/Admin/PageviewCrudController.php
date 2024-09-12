<?php

namespace App\Controller\Admin;

use App\Document\PageView;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
// Importez d'autres types de champs selon vos besoins

class PageviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageView::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('PageView')
            ->setEntityLabelInPlural('PageViews');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id');
        yield TextField::new('nom');
        // Ajoutez d'autres champs selon la structure de votre document
    }
}