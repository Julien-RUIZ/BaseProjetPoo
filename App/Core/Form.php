<?php

namespace App\Core;

class Form
{

    private $formCode = '';

    /**
     * Génère le formulaire HTML
     * @return mixed
     */
    public function create(){
        return $this->formCode;
    }

    /**
     * Valide si tous les champs proposés sont remplis
     * @param array $form Tableau contenant les champs à vérifier (en général issu de $_POST ou $_GET)
     * @param array $fields Tableau listant les champs à vérifier
     * @return bool
     */
    public static function validate(array $form, array $fields){
        // On parcourt chaque champ
        foreach($fields as $field){
            // Si le champ est absent ou vide dans le tableau
            if(!isset($form[$field]) || empty($form[$field])){
                // On sort en retournant false
                return false;
            }
        }
        // Ici le formulaire est "valide"
        return true;
    }

    /**
     * Ajoute les attributs envoyés à la balise
     * @param array $attributs Tableau assiciatif ['class' => 'form-control', 'required'=>true]
     * @return void chaine de caractères générée
     */
    private function ajoutAttributs(array $attributs){
       // On initialise une chaîne de caractères
        $str = '';
        //On liste les attributs "cours"
        $courts = ['checked', 'disabled', 'redonly', 'multiple','required', 'autofocus', 'novalidate', 'formovalidate'];
        //on va boucler sur le tableau d'attributs
        foreach ($attributs as $attribut=>$valeur){
            // Si l'attribut est dans la liste des attributs courts.
            if(in_array($attribut, $courts) && $valeur == true){
                $str .=" $attribut";
            }else{
                // On ajoute attribut = 'valeur'
                $str .= " $attribut='$valeur'";
            }
        }
        return $str;
    }

    /**
     * Balise d'ouverture du formulaire
     * @param string $methode Méthode du formulaire (post ou get)
     * @param string $action Action du formulaire
     * @param array $attributs Attributs
     * @return Form
     */
    public function debutForm(string $methode = 'post', string $action = '#', array $attributs = []): self
    {
        // On crée la balise form
        $this->formCode .= "<form action=$action method=$methode";
        // On ajoute les attributs éventuels
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';
        return $this;
    }

    /**
     * Balise de fermeture du formulaire
     * @return $this
     */
    public function finForm(){
        $this->formCode .= "</form>";
        return $this;
    }

    /**
     * Ajout d'un titre aux différents champs du formulaire
     * @param string $for
     * @param string $texte
     * @param array $attributs
     * @return $this
     */
    public function ajoutLabelFor(string $for, string $texte, array $attributs = []){
        //On ouvre la balise
        $this->formCode .= "<label for='$for'";
        //on ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">".$texte."</label>";
        return $this;
    }

    public function ajoutDiv(array $attributs = []){
        $this->formCode .= "<div";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">";
        return $this;
    }
    public function ajoutDivEnd(){
        $this->formCode .= "</div>";
        return $this;
    }

    /**
     * Ajout d'un champ input
     * @param string $type
     * @param string $nom
     * @param array $attributs
     * @return Form
     */
    public function ajoutInput(string $type, string $nom, array $attributs = []):self
    {
        // On ouvre la balise
        $this->formCode .= "<input type='$type' name='$nom'";
        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';
        return $this;
    }

    /**
     * Ajoute un champ textarea
     * @param string $nom Nom du champ
     * @param string $valeur Valeur du champ
     * @param array $attributs Attributs
     * @return Form Retourne l'objet
     */
    public function ajoutTextarea(string $nom, string $valeur = '', array $attributs = []):self
    {
        // On ouvre la balise
        $this->formCode .= "<textarea name='$nom'";

        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

        // On ajoute le texte
        $this->formCode .= ">$valeur</textarea><br>";

        return $this;
    }

    /**
     * Liste déroulante
     * @param string $nom Nom du champ
     * @param array $options Liste des options (tableau associatif)
     * @param array $attributs
     * @return Form
     */
    public function ajoutSelect(string $nom, array $options, array $attributs = []):self
    {
        // On crée le select
        $this->formCode .= "<select name='$nom'";

        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        // On ajoute les options
        foreach($options as $valeur => $texte){
            $this->formCode .= "<option value='$valeur'>$texte</option>";
        }

        // On ferme le select
        $this->formCode .= '</select>';

        return $this;
    }

    /**
     * Ajoute un bouton
     * @param string $texte
     * @param array $attributs
     * @return Form
     */
    public function ajoutBouton(string $texte, array $attributs = []):self
    {
        // On ouvre le bouton
        $this->formCode .= '<input type="submit"';
        $this->formCode .= " value='$texte'";
        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).">" : ">";


        return $this;
    }
}
