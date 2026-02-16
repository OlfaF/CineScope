<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField; // <- ajouté

class FilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Film::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('title', 'Titre'),
            TextEditorField::new('synopsis', 'Synopsis'),
            IntegerField::new('releaseYear', 'Année de sortie'), // <- ajouté
        ];

        if ($pageName === 'index') {
            // IdField seulement pour la page index (liste)
            array_unshift($fields, IdField::new('id'));
        }

        return $fields;
    }
}
