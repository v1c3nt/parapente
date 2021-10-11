<?php

namespace App\Controller\Admin;

use App\Entity\Option;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Option::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),  
            TextEditorField::new('description'),
            IntegerField::new('prix'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setSearchFields(['nom'])
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('nom')
        ;
    }

}
