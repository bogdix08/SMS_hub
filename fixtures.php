

<?php
require_once 'idiorm.php';
ORM::configure('mysql:host=localhost;dbname=sms-hub');
ORM::configure('username', 'root');
ORM::configure('password', '');
 
ORM::get_db()->exec('DROP TABLE IF EXISTS person;');
ORM::get_db()->exec('DROP TABLE IF EXISTS message;');
ORM::get_db()->exec('DROP TABLE IF EXISTS prieteni;');

ORM::get_db()->exec(
    'CREATE TABLE person (id INTEGER PRIMARY KEY AUTO_INCREMENT, name TEXT,  age INTEGER)'
);

ORM::get_db()->exec(
    'CREATE TABLE message (id INTEGER PRIMARY KEY AUTO_INCREMENT, id_person INTEGER,  message TEXT, FOREIGN KEY(id_person) REFERENCES person(id) )'
);

ORM::get_db()->exec(
    'CREATE TABLE prieteni (id INTEGER PRIMARY KEY AUTO_INCREMENT, id_person INTEGER,  id_friend INTEGER, FOREIGN KEY(id_person) REFERENCES person(id) )'
);
 
function create_person($name, $age) {
    $person = ORM::for_table('person')->create();
    $person->name = $name;
    $person->age = $age;
    $person->save();
    return $person;
}

function create_message($id_person, $msg) {
    $message = ORM::for_table('message')->create();
    $message->id_person = $id_person;
    $message->message = $msg;
    $message->save();
}
 

function create_prieten($id_person, $id_friend) {
    $prieten = ORM::for_table('prieteni')->create();
    $prieten->id_person = $id_person;
    $prieten->id_friend = $id_friend;
	$prieten->save();
	  $prieten1 = ORM::for_table('prieteni')->create();
    $prieten1->id_person = $id_friend;
    $prieten1->id_friend = $id_person;
    $prieten1->save();
}
 
$person_list = array(
    create_person('Corina', 41),
    create_person('Delia', 43),
    create_person('Tudor', 56),
    create_person('Adina', 32),
    create_person('Ada', 50),
    create_person('Camelia', 40),
    create_person('Vlad', 72),
    create_person('Emil', 27),
    create_person('?tefan', 46),
    create_person('Dan', 63),
    create_person('Roxana', 67),
    create_person('Octavian', 34),
    create_person('Radu', 78),
    create_person('Marina', 63),
    create_person('Cezar', 19),
    create_person('Laura', 36),
    create_person('Andreea', 61),
    create_person('George', 28),
    create_person('Liviu', 44),
    create_person('Eliza', 19),
);

$messages_list = array(
	create_message(rand(1,25),'Nu da vrabia din mână pentru cioara de pe gard.'),
	create_message(rand(1,25),'Lumea muncește și sapă și eu duc câinii la apă.'),
	create_message(rand(1,25),'Caută o femeie care-ți place ție, nu la alții.'),
	create_message(rand(1,25),'A bate găina cu lanțul..'),
	create_message(rand(1,25),'Cine nu-ncearcă, nici nu câștigă.'),
	create_message(rand(1,25),'Cine fură azi un ou, mâine va fura un bou.'),
	create_message(rand(1,25),'Tinerii înaintea bătrânilor, să aibă urechi, nu gură!'),
	create_message(rand(1,25),'Nu e dracul așa de negru.'),
	create_message(rand(1,25),'Toate drumurile/căile duc la Roma.'),
	create_message(rand(1,25),'Cine seamănă vânt, culege furtună.'),
	create_message(rand(1,25),'Cele rele sâ se spele, cele bune să se-adune.'),
	create_message(rand(1,25),'Râde hârb/ciob de oală spartă'),
	create_message(rand(1,25),'Prostul nu se lasă până când nu spune tot ce știe'),
	create_message(rand(1,25),'Ce ție nu-ți place, altuia nu-i face.'),
	create_message(rand(1,25),'Nu lăuda ziua înainte de asfințit.'),
	create_message(rand(1,25),'Foamea e cel mai bun bucătar.'),
	create_message(rand(1,25),'Foamea e cel mai bun bucătar.'),
	create_message(rand(1,25),'Nu tot ce zboară se mănâncă.'),
	create_message(rand(1,25),'Bunul gospodar își face vara sanie și iarna car.'),
	create_message(rand(1,25),'Cine aleargă după doi iepuri nu prinde niciunul.'),
	create_message(rand(1,25),'Nu haina îl face pe om.'),
	create_message(rand(1,25),'Ce poți face azi, nu lăsa pe mâine.'),
	create_message(rand(1,25),'Cine are/face carte are patru ochi.'),
	create_message(rand(1,25),'Nevoia te învață.'),
	create_message(rand(1,25),'Lumea muncește și sapă și eu duc câinii la apă.'),
);

$prienteni_list = array (
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
	create_prieten(rand(1,25),rand(1,25)),
);
 
echo('ok<br>');
echo('person ' . ORM::for_table('person')->count() . '<br>');

