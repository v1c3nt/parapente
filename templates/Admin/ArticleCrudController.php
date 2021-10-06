<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    private $photosDirectory;
    private $photosDisplay;
    
    public function __construct( string $photosDirectory, string $photosDisplay)
    {
        $this->photosDirectory = $photosDirectory;
        $this->photosDisplay = $photosDisplay;
    }
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('mainPicture', 'Image principale')->setUploadDir($this->photosDirectory)
            ->setBasePath($this->photosDisplay)->onlyOnIndex(),
            TextField::new('titre'),
            TextEditorField::new('description'),
            IntegerField::new('prix'),
            AssociationField::new('mainPicture', 'photo de présentaion')->hideOnIndex(),
            AssociationField::new('photos')->hideOnIndex(),
        ];
    }
}
