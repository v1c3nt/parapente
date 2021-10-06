<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OrderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Order::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('customer'),
            AssociationField::new('articles'),
            TextField::new('address'),
            TextField::new('city'),
            TextField::new('postCode'),
            IntegerField::new('phone'),
            BooleanField::new('new')->onlyOnIndex(),
            BooleanField::new('inProgress')->onlyOnIndex(),
            BooleanField::new('shipped')->onlyOnIndex(),
            TextField::new('trackingNumber'),
            BooleanField::new('complete ')->onlyOnIndex(),
        ];
    }

}
