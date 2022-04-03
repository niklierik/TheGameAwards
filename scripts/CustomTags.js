/*

Itt találhatóak a custom tag-ek

<my-header> Az oldalak fejléce
<my-nav> Navigációs menü
<my-footer> Az oldal alja, copyright, stb..

*/

class MyHeader extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
<header class="title">
    <div id="title_div">
            <h1 id="title_lbl">
                <img id="title_logo1" src="img/game_awards_logo.png" />
                Az Év Játékai
                <img id="title_logo2" src="img/controller_logo.png" />
            </h1>
    </div>
</header>
<div id="dummy_for_header></div>
        `;
    }

}

class MyNav extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        // Ha nem ilyen undorítóan néz ki, akkor marad egy white-space, amit odarak mint linket
        this.innerHTML = `
<nav>
    <a class="navelement" href="index.html"><button>Főoldal</button></a>
    <a class="navelement" href="sources.html"><button>Források</button></a>
    <hr>
    <button id="showgames">Játékok</button>
    <a class="navelement secret" href="template.html"><button>Sablon-oldal</button></a>
    <a class="navelement game" href="game_2014.html" id="a14"><button><span class="year" id="y14">2014</span><br><span class="gamename" id="n14">Dragon Age: Inquisition</span></button></a>
    <a class="navelement game" href="game_2015.html" id="a15"><button><span class="year" id="y15">2015</span><br><span class="gamename" id="n15">The Witcher 3: Wild Hunt</span></button></a>
    <a class="navelement game" href="game_2016.html" id="a16"><button><span class="year" id="y16">2016</span><br><span class="gamename" id="n16">Overwatch</span></button></a>
    <a class="navelement game" href="game_2017.html" id="a17"><button><span class="year" id="y17">2017</span><br><span class="gamename" id="n17">The Legends of Zelda:<br>Breath of the Wild</span></button></a>
    <a class="navelement game" href="game_2018.html" id="a18"><button><span class="year" id="y18">2018</span><br><span class="gamename" id="n18">God of War</span></button></a>
    <a class="navelement game" href="game_2019.html" id="a19"><button><span class="year" id="y19">2019</span><br><span class="gamename" id="n19">Sekiro: Shadows Die Twice</span></button></a>
    <a class="navelement game" href="game_2020.html" id="a20"><button><span class="year" id="y20">2020</span><br><span class="gamename" id="n20">The Last of Us Part II</span></button></a>
    <a class="navelement game" href="game_2021.html" id="a21"><button><span class="year" id="y21">2021</span><br><span class="gamename" id="n21">It Takes Two</span></button></a>
    <hr>
    <button id="showeditor">Szerkesztői<br>Opciók</button>
    <a class="navelement editor" href="editor.html"><button>Belépés mint<br>Szerkesztő</button></a>
    <hr>
    <a class="navelement" href="#title_div"><button>Vissza az oldal elejére</button></a>
    <div style="padding-bottom: 90px"></div>
</nav>
        `;
    }
}

class MyFooter extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
<footer class="foot">
    <p>
        Az Év Játékai | Copyright &copy; Edvárd Kollár and Erik Nikli 2022
    </p>
</footer>
        `;
    }
}

class MyImports extends HTMLElement {
    constructor() {
        super();
    }
    connectedCallback() {
        this.innerHTML = `

        `;
    }
}

customElements.define("my-header", MyHeader);
customElements.define("my-nav", MyNav);
customElements.define("my-footer", MyFooter);
customElements.define("my-imports", MyImports);