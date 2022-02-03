<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('articles')->insert([
            'gamme_id' => 1,
            'nom' => 'Magnetophone Kidcorder',
            'description_courte' => "Vous cherchez un jeu d'éveil pour votre tout petit ?",
            'description_longue' => "Vous cherchez un jeu d'éveil pour votre tout petit ?

            Le Magnétophone Kidcorner Smoby est un lecteur audio enregistreur qui permet d'enregistrer des voix, des chansons, des bruits ainsi que des histoires. Ce jeu créatif et simple à utiliser, est parfaitement adapté pour bébé, car il n'émet aucune onde. 
            
            Dès ses 12 mois, votre enfant pourra écouter, imaginer, créer et raconter une multitude d'histoires avec le Kidcorder Smoby. 
            
            Ce jeu a été pensé pour stimuler la diction, la mémorisation et l'autonomie de bébé. Ses parents pourront même enregistrer des histoires pour que bébé les écoute quand il le souhaite.
            
            Avec une poignée amovible, les petits pourront emmener leur Kidcorner partout, chez papy et mamie par exemple. Accompagné d'une prise jack, il est possible de brancher un casque audio pour profiter au maximum des enregistrements. 
            
            3 piles LR6 non incluses.",
            'prix' => 24.99,
            'image' => 'microphone.png',
            'stock' => 20,
            'note' => 3.8,
            
        ]);

        DB::table('articles')->insert([
            'gamme_id' => 1,
            'nom' => 'Robot télécommandé - YCOO - Maze Breaker
            ',
            'description_courte' => "La marque YCOO propose une large collection de robots",
            'description_longue' => "Vous cherchez un jeu d'éveil pour votre tout petit ?

            La marque YCOO propose une large collection de robots télécommandés et interactifs pour tous les enfants. Les robots de combat vous feront vivre de l’action à couper le souffle ! Les ingénieurs en herbe trouveront leur bonheur avec les robots programmables. Enfin si vous adorez les animaux, les robots chiens ou dinosaures sont faits pour vous !  

Maze Breaker est un robot adorable et interactif au look futuriste !

Il avance dans toutes les directions, tourne en détectant les obstacles et se contrôle via une application Smartphone. Lorsqu'il rencontre un autre Maze Breaker, il arrive même à interagir avec lui. Il peut également enregistrer la voix de votre enfant et répéter ce qu'il lui dit avec une voix de robot pour passer un bon moment de rigolade.

Votre enfant va pouvoir s'amuser à lui réaliser des labyrinthes pour le tester ou dessiner une ligne qu'il suivra ! 

Il dispose aussi d'effets sonores et lumineux : ses yeux LED changent de couleur.

Nécessite 2 piles LR03 non incluses. La boîte contient un robot et un labyrinthe.

Dimension du produit : 6.5 cm x 12 cm x 6 cm.

Fait partie d'un assortiment de différents modèles.

Vendu à l'unité.

Vendu selon disponibilité.",
            'prix' => 22.99,
            'image' => 'robot.png',
            'stock' => 15,
            'note' => 3.9,
        ]);

        DB::table('articles')->insert([
            'gamme_id' => 1,
            'nom' => 'Journal intime magique Kidisecrets',
            'description_courte' => "Avec KidiSecrets, mon journal intime licorne.",
            'description_longue' => "Avec KidiSecrets, mon journal intime licorne magique les secrets de votre enfant sont bien gardés.

            Kidisecrets est un journal intime magique qui s'ouvre uniquement avec un code secret de 4 chiffres que seul votre enfant connaît. 
            
            L'agenda secret peut également être personnalisé en ajoutant la photo préférée de votre enfant. 
            
            Il peut également écouter les 10 mélodies incluses et enregistrer jusqu'à 10 mémos vocaux.
            
            2 jeux sont inclus : Chiffre mystère et Écho magique pour s'amuser à déformer sa voix.
            
            L'agenda électronique contient un compartiment secret sous le carnet pour cacher ses petits mots, bijoux, porte-bonheur...
            
            Le Kidisecrets contient un feutre et un carnet (format A6, 30 pages recto-verso dont 4 pages à customiser) pour écrire ses secrets.
            
            Réglage du volume sonore et arrêt automatique.
            
            Fonctionne avec 3 piles LR06 incluses.",
            'prix' => 27.99,
            'image' => 'journal.png',
            'stock' => 12,
            'note' => 2.5,
        ]);

        DB::table('articles')->insert([
            'gamme_id' => 2,
            'nom' => 'Peluche jungle',
            'description_courte' => "Peluches à collectionner sur le thème des animaux de la jungle.",
            'description_longue' => "Peluches à collectionner sur le thème des animaux de la jungle.

            Une peluche de 38 cm, douce et adorable avec ses grands yeux que votre enfant souhaitera adopter et câliner.
            
            Fait partie d'un assortiment de 3 différents modèles : tigre ou girafe ou léopard.
            Vendu à l'unité.
            Vendu selon disponibilité.",
            'prix' => 7.99,
            'image' => 'girafe.png',
            'stock' => 5,
            'note' => 3.1,
        ]);

        DB::table('articles')->insert([
            'gamme_id' => 2,
            'nom' => 'Teeny tys small - slippery',
            'description_courte' => "Craquez devant cette peluche irrésistible.",
            'description_longue' => "Craquez devant cette peluche irrésistible
            Issu de la collection Teeny Tys, Slippery est un phoque devant lequel on ne peut que craquer avec ses grands yeux brillants, son regard innocent, et ses rondeurs. Doté d'un pelage extrêmement doux, Slippery sait donner toute la tendresse dont un enfant à besoin. Slippery réserve des heures et des heures de caresses, de jour comme de nuit. La peluche Slippery mesure 8 cm. Vous pouvez la collectionner avec d'autres animaux de la gamme Teeny Tys (vendus séparément) comme, par exemple, Diggs le boxer ou Nellie la chouette. En les empilant, elles peuvent parfaitement décorer le mur de la chambre de votre enfant. Enfin, comme les autres peluches Teeny Tys, Slippery a une date d'anniversaire : le 24 mars.",
            'prix' => 4.99,
            'image' => 'phoque.png',
            'stock' => 8,
            'note' => 5.0,
        ]);

        DB::table('articles')->insert([
            'gamme_id' => 2,
            'nom' => 'Hello le Dino',
            'description_courte' => "Une peluche Hello le Dino.",
            'description_longue' => "Une peluche Hello le Dino toute douce à adopter ... Cet adorable dinosaure tout bleu marine a quitté la préhistoire pour la chambre de bébé.

            Ensemble, ils partageront de tendres instants de complicité.
            
            Un super cadeau de naissance !
            
            Dimension : 38 cm
            
            Lavable en machine à 30°.
            ",
            'prix' => 19.99,
            'image' => 'dinosaure.png
            ',
            'stock' => 18,
            'note' => 2.4,
        ]);

        // On peut créer les seeder comme ça aussi (c'est la même chose que au-dessus)

        Article::create([
            'nom' => 'Méga Mission',
            'description_courte' => 'Méga Mission est une course contre la montre.',
            'description_longue' => "Un jeu de société avec un relais électronique et lumineux qui se joue à l'intérieur comme à l'extérieur.

            Il dispose de 3 modes de jeu afin de varier les plaisirs :
            - La course : soyez le plus rapide à connecter le relais sur les 5 bases de couleurs.
            - Compte à rebours : connectez le relais sur le plus grand nombre de bases possible dans un temps limité.
            - Course relais : en équipe, connectez les 5 bases de couleurs chacun votre tour en vous passant le relais le plus vite possible.
            
            Un jeu d'action qui se joue seul ou en équipe et qui va permettre à votre enfant de se dépenser tout en s'amusant.
            
            La boîte contient un relais électronique et lumineux, 5 bases de couleurs et une règle du jeu.
            
            Nécessite 3 piles LR03 non incluses.",
            'image' => 'mega.png',
            'gamme_id' => 3,
            'prix' => 29.99,
            'stock' => 35,
            'note' => 4.8,
        ]);

        Article::create([
            'nom' => 'Picture Show',
            'description_courte' => "Faites deviner des titres de films et des expressions",
            'description_longue' => "Par équipes, faites deviner des titres de films et des expressions à vos partenaires… En vous aidant d’ombres chinoises et en temps limité ! 

            Picture Show est un jeu d'ombres chinoises qui propose des dizaines de situations pour mettre à l’épreuve votre sens de la mise en scène. Grâce à des icônes claires et aimantées et un projecteur (qui fait aussi timer !), vous pouvez animer tout et n’importe quoi derrière l’écran. Jouez sur les perspectives pour faciliter la tâche à votre équipe. Imagination, créativité, réflexion et association d’idées sont de la partie ! Vous pouvez vous aider d’onomatopées ou dévoiler le thème de votre mise en scène, mais votre score dépend des indices supplémentaires que vous vous accordez. 
            
            Picture Show est un jeu d’ambiance familial et original, que les joueurs s’approprient en cinq minutes pour des heures de fun ! Les plus jeunes apprécieront le matériel et la mécanique de jeu tandis que les plus grands apprécieront le moment convivial passé.
            
            La boîte contient :
            
            un écran
            une lampe-timer
            45 formes magnétiques
            2 sticks aimantés
            120 propositions (expression, film, situations)
            un livret de règles
            Nécessite 3 piles LR03 non fournies.
            
            Ce jeu a été élu au Grand Prix du Jouet 2019 dans la catégorie 'Jeu Famille.'",
            'image' => 'ombre.png',
            'gamme_id' => 3,
            'prix' => 29.99,
            'stock' => 10,
            'note' => 4.9,
        ]);

        Article::create([
            'nom' => 'Sauve moutons',
            'description_courte' => 'Sauve moutons et un jeu coopératif',
            'description_longue' => "Sauve moutons et un jeu coopératif qui véhicule des valeurs d’entraide et de partage, essentielles pour bien grandir.

            Vous devez aider le berger à guider son troupeau jusqu’aux tendres pâturages des sommets. Mais attention, le loup rôde et il a vraiment très faim !
            Soyez malins et unis pour l’éviter et déjouer les pièges de ce jeu coopératif en 3D, plein d’humour et de rebondissements.
            
            Contenu :
            - 1 montagne en 3D
            - 10 moutons en bois
            - 1 loup en bois
            - 1 berger en bois
            - 20 cartes « déplacements »
            - 20 cartes « actions »
            
            Durée de la partie : 20 minutes.
            De 1 à 5 joueurs.
            
            Jeu éco-conçu fabrication responsable.
            
            Fabriqué en France.",
            'image' => 'mouton.png',
            'gamme_id' => 3,
            'prix' => 24.99,
            'stock' => 7,
            'note' => 5.0,
        ]);
    }
}
