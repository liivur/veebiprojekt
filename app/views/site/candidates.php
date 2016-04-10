<?php

use app\models\activerecord\Parties;

$this->title = Yii::t('app', 'candidates');

$parties = Parties::find()->with('members')->all();
?>

<h1 class="middle"><?= Yii::t('app', 'candidates') ?></h1>
<hr>
<?php
    echo '<h1>' .Yii::t('app', 'parties').'</h1>';
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