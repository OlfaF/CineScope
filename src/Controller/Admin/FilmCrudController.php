<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class FilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Film::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // Champ ID : uniquement visible dans la liste (index)
        yield IdField::new('id')->onlyOnIndex();

        // Autres champs pour tous les formulaires (new, edit, index)
        yield TextField::new('title', 'Titre');
        yield TextEditorField::new('synopsis', 'Synopsis');
        yield IntegerField::new('releaseYear', 'Année de sortie');

  
    }
}
