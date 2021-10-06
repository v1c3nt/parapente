<?php
namespace App\Service;

class CouleurService
{
    private $couleur = [
        'blanc' => 'blanc',
        'bleu-vert' => 'bleu-vert',    
        'bleu' => 'bleu',
        'gris' => 'gris',    
        'jaune' => 'jaune',           
        'marron' => 'marron',          
        'multicolore' => 'multicolore',         
        'noir' => 'noir',            
        'orange' =>'orange',      
        'rose' => 'rose',     
        'rouge' => 'rouge',      
        'transparent' => 'transparent',               
        'truquoise' => 'truquoise',      
        'vert' => 'vert',
        'violet' => 'violet',         
    ];

    public function getCouleur()
    {
        return $this->couleur;
    }

}