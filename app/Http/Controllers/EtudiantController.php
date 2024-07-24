<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function liste_etudiant(){
        $etudiants=Etudiant::paginate(4);
        //Le paramètre compact va nous permettre d'ejecter la variable $etudiants au niveau de la vue
        return view('etudiant.liste',compact('etudiants'));

    }
    public function ajouter_etudiant(){
        return view('etudiant.ajouter');
    }
    public function ajouter_etudiant_traitement(Request $request){
        // Cette  methode permet de vérifier les differents élements envoyés par l'utilisateur
        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'classe'=> 'required',
        ]);
        // On va instancier la classe afin de l'utiliser
        $etudiant=new Etudiant();
        //Affectation des données envoyés par l'utilisateur à la classe
        $etudiant->nom=$request->nom;
        $etudiant->prenom=$request->prenom;
        $etudiant->classe=$request->classe;
        //Sauvegarde des données dans la BDD
        $etudiant->save();
        //Retourner la réponse
         return redirect('/ajouter')->with('status','Enregistrement effectué avec succès!');

    }
    public function update_etudiant($id){
        //On recherche l'objet etudiant
        $etudiants=Etudiant::find($id);

        return view('etudiant.update',compact('etudiants'));
    }
    public function update_etudiant_traitement(Request $request){
        // Cette  methode permet de vérifier les differents élements envoyés par l'utilisateur
        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'classe'=> 'required',
        ]);
        // On va instancier la classe afin de l'utiliser
        $etudiant=Etudiant::find($request->id);
        //Affectation des données envoyés par l'utilisateur à la classe
        $etudiant->nom=$request->nom;
        $etudiant->prenom=$request->prenom;
        $etudiant->classe=$request->classe;
        //Sauvegarde des données dans la BDD
        $etudiant->update();
        //Retourner la réponse
         return redirect('/etudiant')->with('status','Modification effectuée avec succès!');
    }
    public function delete_etudiant($id){
        $etudiant=Etudiant::find($id);
        $etudiant->delete();
        //Retourner la réponse
        return redirect('/etudiant')->with('status','Suppression effectuée avec succès!');
    }
}
