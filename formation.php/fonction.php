<?php
function afficherMessageBienvenue(){
    echo "Bienvenue sur l'intranet de l'entreprise !<br>";
}

 afficherMessageBienvenue() . "<br>";

 function accueillirMembreTyrolium($prenom, $role){
    echo "Bonjour $prenom votre acces en tant que $role est bien configuré chez Tyrolium .<br>";
 }

  accueillirMembreTyrolium("Alice", "Dévelopeuse");
   accueillirMembreTyrolium("Marc", "Designer");