<?php

use app\models\activerecord\Parties;

$parties = Parties::find()->with('members')->all();

$connection = Yii::$app->getDb();
$command = $connection->createCommand('
    SELECT parties.name AS party_name, count(users.id) AS members
    FROM parties 
    LEFT JOIN users ON users.party_id = parties.id
    GROUP BY parties.id
    ');

$partyCount = $command->queryAll();

$command = $connection->createCommand('
    SELECT users.name AS user_name, parties.name AS party_name
    FROM users 
    INNER JOIN parties ON users.party_id = parties.id
    ');
$usersRawSql = $command->queryAll();
?>

<h1 class="middle"><?= Yii::t('app', 'candidates') ?></h1>
<hr>
<?php
    echo '<h1>' .Yii::t('app', 'parties').'</h1>';
    foreach ($partyCount as $party) {
        echo '<div class="col-md-4">';
        echo '<h3>'.$party['party_name'].' - '.$party['members'].'</h3>';
        echo '</div>';
    }
    echo '<h1>'.Yii::t('app', 'people').'</h1>';
    echo '<div class="col-md-12">';
    foreach ($usersRawSql as $user) {
        echo '<h3>'.$user['user_name'].' - '.$user['party_name'].'</h3>';
    }
    echo '</div>';
    // foreach ($parties as $party) {
    //     echo '<div class="col-md-4">';
    //     echo '<h3>'.$party->name.' - '.count($party->members).'</h3>';
    //     foreach ($party->members as $member) {
    //         // echo '<div>'.$member->name.' <a href="#">Hääleta</a></div>';
    //         echo '<div>'.$member->name.'</div>';
    //     }
    //     echo '</div>';
    // }
?>