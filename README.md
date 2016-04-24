# myMVC

### A lire avant tout nouveau projet :

* Modifier les configurations serveur dans application/config/config.php

* Créer un modèle :
	* Créer la classe commençant par une majuscule et sans 's' à la fin (EX: Membre)
	* Ajouter les attributs en public concernant les colonnes de la table : public id, ...;
	* Faire un extends de la classe avec le parent Model
	* Dans le constructeur, ajouter : parent::__construct(get_object_vars($this), array('number','text')); // Le dernier paramètre concerne l'ensemble des types dans l'ordre d'ajout des attributs de classe
	* S'il le faut, surcharger une méthode si celle-ci ne convient au fonctionnement propre du site
	* S'il s'agit d'une classe comportant des informations SEO, faire une implémentation de Seo

* Créer un manager de modèles :
	* Créer la classe commençant par une majuscule suivie de sManager (EX: MembresManager)

* Un lien est lu comme suit :
	* url_controller/url_action/param1/param2/...