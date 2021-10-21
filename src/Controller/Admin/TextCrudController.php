<?php

namespace App\Controller\Admin;

use App\Entity\Text;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TextCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Text::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // TextField::new('title')->setHelp('le texte n'est pas activé),
            TextEditorField::new('body'),
            ChoiceField::new('location', 'emplacement')->setChoices(['titre du site' => 'title', 'texte de présentation' => 'presentation', 'avant la galerie' => 'gallery', 'pied de page' => 'pre-footer'])
        ];
    }
}
