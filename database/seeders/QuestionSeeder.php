<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            ['body' => 'Votre adresse mail', 'type' => 'B', 'order' => 1],
            ['body' => 'Votre âge', 'type' => 'B', 'order' => 2],
            ['body' => 'Votre sexe', 'type' => 'A', 'options' => ['Homme', 'Femme', 'Préfère ne pas répondre'], 'order' => 3],
            ['body' => 'Nombre de personne dans votre foyer (adulte & enfants)', 'type' => 'C', 'order' => 4],
            ['body' => 'Votre profession', 'type' => 'B', 'order' => 5],
            ['body' => 'Quelle marque de casque VR utilisez-vous ?', 'type' => 'A', 'options' => ['Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'Valve index'], 'order' => 6],
            ['body' => 'Sur quel magasin d’application achetez vous des contenus VR ?', 'type' => 'A', 'options' => ['SteamVR', 'Occulus store', 'Viveport', 'Windows store'], 'order' => 7],
            ['body' => 'Quel casque envisagez-vous d’acheter dans un futur proche ?', 'type' => 'A', 'options' => ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'PSVR', 'Autre', 'Aucun'], 'order' => 8],
            ['body' => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?', 'type' => 'C', 'order' => 9],
            ['body' => 'Vous utilisez principalement Bigscreen pour :', 'type' => 'A', 'options' => ['regarder la TV en direct', 'regarder des films', 'travailler', 'jouer en solo', 'jouer en équipe'], 'order' => 10],
            ['body' => 'Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?', 'type' => 'C', 'order' => 11],
            ['body' => 'Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?', 'type' => 'C', 'order' => 12],
            ['body' => 'Combien donnez-vous de point pour la connexion réseau de Bigscreen ?', 'type' => 'C', 'order' => 13],
            ['body' => 'Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?', 'type' => 'C', 'order' => 14],
            ['body' => 'Combien donnez-vous de point pour la qualité audio dans Bigscreen ?', 'type' => 'C', 'order' => 15],
            ['body' => 'Aimeriez-vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 'type' => 'A', 'options' => ['Oui', 'Non'], 'order' => 16],
            ['body' => 'Aimeriez-vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?', 'type' => 'A', 'options' => ['Oui', 'Non'], 'order' => 17],
            ['body' => 'Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?', 'type' => 'A', 'options' => ['Oui', 'Non'], 'order' => 18],
            ['body' => 'Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?', 'type' => 'A', 'options' => ['Oui', 'Non'], 'order' => 19],
            ['body' => 'Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?', 'type' => 'B', 'order' => 20],
        ];
        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
