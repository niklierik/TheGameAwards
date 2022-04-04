<?php

$array=[14,15,16,17,18,19,20,21];

echo "<div id=\"nav_div\"><nav>
    <a class=\"navelement\" href=\"index.php\"><button>Főoldal</button></a>
    <a class=\"navelement\" href=\"sources.php\"><button>Források</button></a>
    <hr>
    <button id=\"showgames\">Játékok</button>
    <a class=\"navelement secret\" href=\"template.php\"><button>Sablon-oldal</button></a>";
foreach($array as $g){
    echo "<a class=\"navelement game\" href=\"game_20$g.php\" id=\"a$g\"><button><span class=\"year\" id=\"y14\">20$g</span><br><span class=\"gamename\" id=\"n$g\">Dragon Age: Inquisition</span></button></a>";
}

    echo "<hr>
    <button id=\"showeditor\">Szerkesztői<br>Opciók</button>
    <a class=\"navelement editor\" href=\"editor.php\"><button>Belépés mint<br>Szerkesztő</button></a>
    <hr>
    <a class=\"navelement\" href=\"#title_div\"><button>Vissza az oldal elejére</button></a>
    <div style=\"padding-bottom: 90px\"></div>
</nav></div>";