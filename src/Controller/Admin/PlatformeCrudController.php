<?php

namespace App\Controller\Admin;

use App\Entity\Platforme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PlatformeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Platforme::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            TextField::new('name', 'Nom'),

            TextField::new('url', 'URL'),

            ImageField::new('logo', 'Logo')
                ->setBasePath('/uploads/logos')
                ->setUploadDir('public/uploads/logos')
                ->setRequired(false),

            AssociationField::new('films')
                ->setFormTypeOption('by_reference', false),
        ];
    }
}
