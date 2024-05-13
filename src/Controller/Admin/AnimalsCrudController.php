<?php

namespace App\Controller\Admin;

use App\Entity\Animals;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimalsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animals::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('imageani')
                ->setBasePath('uploads')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired('false')
        ];

        $prenomani = textField::new('prenomani');

        $raceani = TextField::new('raceani');

        $habitatani = AssociationField::new('habitatani');

        $foodwork = TextField::new('foodani');

        $quantitework = IntegerField::new('quantiteani');

        $etatwork = TextField::new('etatani');

        
        $fields[] = $prenomani;
        $fields[] = $raceani;
        $fields[] = $habitatani;
        $fields[] = $foodwork;
        $fields[] = $quantitework;
        $fields[] = $etatwork;



        return $fields;
    }
    
}

