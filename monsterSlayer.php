<?php
include_once('/app/utils/class.utils.inc.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vue</title>

    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:image" content="">

    <link rel="stylesheet" href="/app/theme/css/<?= Utils::getAssetRevision( "master.min.css", "styles" ) ?>" type="text/css" />
</head>

<body id="body">

<div id="monsterSlayer">
<button @click="test($event, 'attack')">Test</button>
    <section class="row">
        <div class="small-6 columns">
            <h1 class="text-center">YOU</h1>
            <div class="healthbar">
                <div :style="playerHealthBar" class="healthbar text-center" style="background-color: green; margin: 0; color: white;">
                {{ playerHealth }}
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <h1 class="text-center">MONSTER</h1>
            <div class="healthbar">
                <div :style="monsterHealthBar" class="healthbar text-center" style="background-color: green; margin: 0; color: white;">
                {{ monsterHealth }}
                </div>
            </div>
        </div>
    </section>
    <section class="row controls">
        <div v-if="!gameStarted" class="small-12 columns">
            <button @click="gameStarted = !gameStarted" id="start-game">START NEW GAME</button>
        </div>
    </section>
    <section v-if="gameStarted" class="row controls">
        <div class="small-12 columns">
            <button @click="attack" id="attack">ATTACK</button>
            <button @click="specialAttack" id="special-attack">SPECIAL ATTACK</button>
            <button @click="heal" id="heal">HEAL</button>
            <button @click="giveUp" id="give-up">GIVE UP</button>
        </div>
    </section>
    <section v-if="turns.length > 0" class="row log">
        <div class="small-12 columns">
            <ul>
                <li :class="{'player-turn': turn.isPlayer, 'monster-turn' : !turn.isPlayer}" v-for="turn in turns">
                    {{ turn.text }}  
                    <hr>            
                </li>
            </ul>
        </div>
    </section>
</div>  

<?php /*

*/
?>
<script src="/app/theme/js/<?= Utils::getAssetRevision( "plugins.min.js", "plugin-scripts" ) ?>"></script>
<script src="/app/theme/js/<?= Utils::getAssetRevision( "app.min.js", "scripts" ) ?>"></script>
</body>
</html>