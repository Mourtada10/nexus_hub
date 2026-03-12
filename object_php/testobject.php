<?php

class Personnage{
    public $nom;
    public $vie;
    public $force;

    public function __construct($nom, $force){
        $this->nom = $nom;
        $this->force = $force;
        $this->vie = 100;
    }

    public function afficherInfos(){
        echo $this->nom . "a" .  $this->vie . "PV et" . $this->force . "d'attaque";
    }

    public function attaquer($cible){
        $cible->vie = $this->vie - $this->force;
        echo $this->nom . "attaque" . $cible . "et lui retire" .  $this->force . "PV";
    }
}

$guerrier = new Personnage("Maximus", 20);
$monstre = new Personnage("Shadow", 15);

$guerrier->afficherInfos();
$monstre->afficherInfos();

$guerrier->attaquer($monstre);

$monstre->afficherInfos();

$monstre->attaquer($guerrier);

$guerrier->afficherInfos();




