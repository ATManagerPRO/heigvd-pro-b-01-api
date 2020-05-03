<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'id' => 1,
            'todo_list_id' => 3,
            'user_id' => 1, // Whose assigned
            'interval_id' => null,
            'title' => 'Test des battle royal disponibles',
            'details' => 'Tester tous les battle royal disponibles et faire un classement du pire au meilleur.',
            'dueDate' => Carbon::create('2020', '04', '30', '20', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 2,
            'todo_list_id' => 3,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Préparer live twitch',
            'details' => 'Préparer tout ce qu il faut pour setup un live twitch.',
            'dueDate' => Carbon::create('2020', '04', '30', '15', '30', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 3,
            'todo_list_id' => 2,
            'user_id' => null, // Whose assigned
            'interval_id' => 2,
            'title' => 'Jour des jambes',
            'details' => 'Barbell squat, Leg press, Leg extensions',
            'dueDate' => Carbon::create('2020', '04', '30', '09', '10', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => 1,
            'intervalEndDate' => Carbon::create('2020', '05', '17'),
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 4,
            'todo_list_id' => 1,
            'user_id' => null, // Whose assigned
            'interval_id' => 1,
            'title' => 'Devoir',
            'details' => 'Faire mes devoirs comme le bon élève que je suis',
            'dueDate' => Carbon::create('2020', '04', '30', '22', '45', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => 1,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 5,
            'todo_list_id' => 4,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Faire les cours',
            'details' => 'Prendre du lait et du chocolat',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // -------------------------------------------

        DB::table('todos')->insert([
            'id' => 6,
            'todo_list_id' => 5,
            'user_id' => null, // Whose assigned
            'interval_id' => 3,
            'title' => 'Payer internet',
            'details' => 'Payer facture mensuel d\'internet',
            'dueDate' => Carbon::create('2020', '05', '29', '13', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => 1,
            'intervalEndDate' => Carbon::create('2020', '12', '30'),
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 7,
            'todo_list_id' => 5,
            'user_id' => null, // Whose assigned
            'interval_id' => 3,
            'title' => 'Payer swisscom natel',
            'details' => 'Payer facture mensuel de swisscom pour le natel',
            'dueDate' => Carbon::create('2020', '05', '29', '13', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => 1,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 8,
            'todo_list_id' => 5,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Payer trajet CFF',
            'details' => 'Payer facture trajets CFF si y en a',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 9,
            'todo_list_id' => 5,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Payer casque HS70 digitec',
            'details' => 'Payer facture du casque gaming corsair HS70 PRO',
            'dueDate' => Carbon::create('2020', '05', '08', '13', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '05', '07', '15', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 10,
            'todo_list_id' => 5,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Payer armoire IKEA',
            'details' => 'Payer facture armoire murale IKEA',
            'dueDate' => Carbon::create('2020', '05', '15', '13', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '05', '13', '13', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 11,
            'todo_list_id' => 5,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Payer TV digitec',
            'details' => 'Payer TV samsung digitec',
            'dueDate' => Carbon::create('2020', '05', '01', '13', '00', '00'),
            'dateTimeDone' => Carbon::create('2020', '05', '01', '10', '30', '00'),
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 12,
            'todo_list_id' => 6,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Meuble à prendre',
            'details' => 'meuble salle de bain, TV, meuble TV, canapé, tout le cheni sur le bureau, ustensiles de cuisine, figurines POP, tout ce qu\'il y a sous le lit, guitares + batterie, alcool + meuble alcool, tous les trucs du chat, tableaux + posters.',
            'dueDate' => Carbon::create('2020', '05', '11', '13', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 13,
            'todo_list_id' => 6,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Chose à trier (goodies & habits)',
            'details' => 'Trier goodies bureau et tous les habits',
            'dueDate' => Carbon::create('2020', '05', '11', '13', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 14,
            'todo_list_id' => 6,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Plan nouvel appart',
            'details' => 'Faire les plans sur ordi de l\'appart et voir qu\'est ce qui passe ou comme meuble.',
            'dueDate' => Carbon::create('2020', '05', '10', '16', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 15,
            'todo_list_id' => 6,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Prendre mesures',
            'details' => 'Prendre les mesures du nouvel appart (pas oublié le double mètre)',
            'dueDate' => Carbon::create('2020', '04', '29', '20', '10', '00'),
            'dateTimeDone' => Carbon::create('2020', '04', '28', '13', '00', '00'),
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 16,
            'todo_list_id' => 7,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Rendu labo3 River',
            'details' => 'Rendu labo3 River',
            'dueDate' => Carbon::create('2020', '05', '04', '17', '25', '17'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 17,
            'todo_list_id' => 7,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Exo slide 12',
            'details' => 'Faire exo slide 12 (attention, sans dynamic ast !)',
            'dueDate' => Carbon::create('2020', '04', '15', '17', '00', '02'),
            'dateTimeDone' => Carbon::create('2020', '04', '15', '16', '00', '00'),
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 18,
            'todo_list_id' => 7,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Exo slide 24',
            'details' => 'Faire exo slide 24, possible en groupe',
            'dueDate' => Carbon::create('2020', '05', '13', '23', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 19,
            'todo_list_id' => 7,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'EXAMEN',
            'details' => 'Examen salle B02',
            'dueDate' => Carbon::create('2020', '06', '11', '13', '30', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '06', '11', '13', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 20,
            'todo_list_id' => 8,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Labo5 : TD',
            'details' => 'Finir et rendre labo5 TDD',
            'dueDate' => Carbon::create('2020', '05', '23', '11', '30', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 21,
            'todo_list_id' => 8,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Ex UML',
            'details' => 'Faire en solo l\'exo UML',
            'dueDate' => Carbon::create('2020', '03', '29', '17', '30', '00'),
            'dateTimeDone' => Carbon::create('2020', '03', '29', '18', '00', '00'),
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 22,
            'todo_list_id' => 8,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'EXAMEN',
            'details' => 'Examen salle B01',
            'dueDate' => Carbon::create('2020', '06', '12', '13', '30', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '06', '12', '13', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 23,
            'todo_list_id' => 9,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Pâté en croûte fête famille',
            'details' => 'Préparer le filet de porc et la pâte feuilleté, pour pouvoir amener lundi en Valais',
            'dueDate' => Carbon::create('2020', '05', '22', '20', '30', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 24,
            'todo_list_id' => 9,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Faire croissants au jambon',
            'details' => 'Préparer les croissants au jambon pour l\'anni à John',
            'dueDate' => Carbon::create('2020', '04', '09', '20', '30', '00'),
            'dateTimeDone' => Carbon::create('2020', '04', '09', '22', '00', '00'),
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 25,
            'todo_list_id' => 11,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'A prendre pour la plage',
            'details' => 'Maillot de bain, crème solaire, chaise longue, parasol, sceau, lunette + tuba, kayak, bouillée.',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 26,
            'todo_list_id' => 11,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'A prendre pour la montagne',
            'details' => 'Habits chaud, gourde, chaussure montagnem, crème solaire, sac, tente, lampe frontale, à manger.',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 27,
            'todo_list_id' => 12,
            'user_id' => 1, // Whose assigned
            'interval_id' => null,
            'title' => 'Billet avion',
            'details' => 'Penser à réserver les billets d\'avion',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '06', '15', '12', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 28,
            'todo_list_id' => 12,
            'user_id' => 1, // Whose assigned
            'interval_id' => null,
            'title' => 'Chambre d\'hôtel',
            'details' => 'Penser à réserver l\'hôtel',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '06', '15', '12', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 29,
            'todo_list_id' => 13,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Liste de course',
            'details' => 'Pain, céréales, bonbons, steak wapiti, purée, broccolis, banane, moutarde, langue de boeuf',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 30,
            'todo_list_id' => 13,
            'user_id' => 1, // Whose assigned
            'interval_id' => null,
            'title' => 'Course pour la soirée potes',
            'details' => 'Olives, chips, bières, bières et bières',
            'dueDate' => Carbon::create('2020', '05', '29', '17', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 31,
            'todo_list_id' => 14,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Sorties de jeux cool',
            'details' => 'WoW nouvelle extension (juillet), valorant (juillet), assassin\'s creed (2021)',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 32,
            'todo_list_id' => 15,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Amener réparer la Gibson',
            'details' => 'Amener à Marclay musique la Gibson ',
            'dueDate' => Carbon::create('2020', '06', '20', '14', '30', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '06', '20', '11', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 33,
            'todo_list_id' => 15,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Aller rechercher la Gibson',
            'details' => 'Aller rechercher à Marclay musique la Gibson',
            'dueDate' => Carbon::create('2020', '06', '27', '14', '00', '00'),
            'dateTimeDone' => null,
            'reminderDateTime' => Carbon::create('2020', '06', '27', '11', '00', '00'),
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 34,
            'todo_list_id' => 15,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Liste chansons à apprendre',
            'details' => 'Deep Purple (smoke on the water), Metallica (nothing else matter), Sum41 (over my head)',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
