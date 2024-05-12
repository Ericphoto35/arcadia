<?php

namespace App\Controller\Admin;

use App\Entity\Habitats;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HabitatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Habitats::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('habitatimage')
                ->setBasePath('uploads')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired('false')
        ];

        $habitatname = textField::new('habitatnom');

        $habitatdescription = TextEditorField::new('habitatdescription');

        $fields[]= $habitatname;
        $fields[] = $habitatdescription;

        return $fields;
    }
}
