<?php
namespace App\Service;

class BasketService
{
    public function summary(array $articles)
    {
        $totalAmound = 0;
        $totalNumber = 0;
        $shippingCoast = 0;

        foreach ($articles as $article) {

            $number = $article['number'];
            $price = $article['article']->getPrix();

            if ( null !== $article['article']->getRemise() ){
                $price = $price - (round($price* ($article['article']) / 100, 2));
            }
            $totalArticle = $price * $number;

            $totalNumber += $number;
            $totalAmound += $totalArticle;
        }
        //frais de port.
        if ( 1 <= $totalNumber){
            $shippingCoast = 6;
        }
        if ( 1 < $totalNumber){
            $shippingCoast += 6;
        }
        $totalAmound += $shippingCoast;

        //Taxe
        $taxes = $totalAmound - round($totalAmound / 1.2, 2);

        return ['basket' => $articles, 'totalAmound' => $totalAmound, 'taxes' => $taxes, 'shippingCoast' => $shippingCoast];
    }
}