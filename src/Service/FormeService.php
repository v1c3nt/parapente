<?php
namespace App\Service;

class FormeService
{
    private $forme = [
        'brute' => 'brute',
        'carré' => 'carré',
        'coeur' => 'coeur',
        'cylindre' => 'cylindre',
        'emeraude' => 'emeraude',
        'facette' => 'facette',
        'ovale' => 'ovale',
        'perle' => 'perle',
        'poire' => 'poire',
        'ronde' => 'ronde',
        'triangle' => 'triangle',
    ];

    public function getForme()
    {
        return $this->forme;
    }

}