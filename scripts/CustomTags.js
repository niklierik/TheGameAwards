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
        `;
    }
}

class MyFooter extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `

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