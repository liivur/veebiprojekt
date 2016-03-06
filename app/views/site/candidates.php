<?php

use app\models\activerecord\Parties;

$parties = Parties::find()->with('members')->all();
?>

<h1 class="middle">Kandidaadid</h1>
<hr>
<?php
    foreach ($parties as $party) {
        echo '<div class="col-md-4">';
        echo '<h3>'.$party->name.' - '.count($party->members).'</h3>';
        foreach ($party->members as $member) {
            // echo '<div>'.$member->name.' <a href="#">Hääleta</a></div>';
            echo '<div>'.$member->name.'</div>';
        }
        echo '</div>';
    }
?>