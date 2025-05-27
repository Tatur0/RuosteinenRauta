
const referenssit = {
    0: [
        "Massiivinen, reippaan punainen Tallinnan silta avattiin liikenteelle tammikuussa 2020. Siltahanke on yksi Suomen ja Viron suurimpia yhteisiä rakennushankkeita. Tähän merkittävään rakennushankkeeseen osallistuivat kaikki suurimmat rakennusyhtiöt ja toimijat Suomesta ja Virosta.  Ruosteinen Rauta Oy: toimitti kaikki sillan kaiteitten terärakenteiden tukevat pultit ja kaapelien suojaputket pääurakoitsija Valtakunnan Sillat Oy:lle. Pultti ja suojaputkitoimitukset saatiin toimitettua aikataulun mukaisesti.",
        "Valtakunnan Sillat Oy valitsi Ruosteinen Rauta Oy:n pultti ja suojaputkitoimittajaksi aikaisemman yhteistyön perusteella luottaen, että hankkeen tiukassa aikataulussa pysytään, kun pultit ja suojaputkitoimituksissa on luotettava kumppani.",
        "Seppo Silta kertookin yhteistyöstä ja toimituksista seuraavasti ”Ruosteinen Rauta yhtenä suurimpana rautakauppa ja metallialan toimittajana pystyy toimittamaan suuria määriä rakennustarvikkeita kriittisiin projekteihin. Yhteistyö Ruosteisen Raudan kanssa on toiminut aina hyvin ja tehokkaasti”.",
    ],
    1: [
        "Koneline Oy tarjoaa maansiirto ja maatyö palveluita rakentajille. Vuonna 2021 KoneLine Oy luopui omista maansiirtokoneistaan ja käyttää urakoissaan Ruosteinen Rauta Oy:n vuokralaitevalikoimaa.",
        "”Ruosteinen Rauta Oy” toimittaa meille projekteihin tarvittavia laitteistoja ja koneita. Koneet ja laitteet ovat aina toimivia ja hyvin huollettuja. Siirtyessämme vuokrakoneiden käyttöön, olemme pystyneet tarjoamaan maansiirtotöitä erittäin edulliseen hintaan asiakkaillemme. Vuokrakoneiden käytössä pystymme käyttämään ja saamaan käyttöömme juuri oikean laitteen oikeaan aikaan ja tämä luo liiketoimintaan kustannustehokkuutta. Ruosteinen Rauta on merkittävä kumppanimme, joka mahdollistaa toimintamme joustavuuden. Kannattavuutemme on kasvanut 89% kun siirryimme hyödyntämään Ruosteisen Raudan vuokrakonevalikoimaa toiminnassamme. ” Kertoo toimitusjohtaja Jorma Kontio Koneline Oy:stä. Koneline Oy suositteleekin Ruosteisen Raudan konevalikoimaan pienemmille ja suuremmille työmaille. "
    ],
    2: [
        "Uniikki koti rakentui Poriin vuonna 2019. Rakentaja Jussi Ahola rakensi unelmiensa kodin hankkien kaikki rakennustarvikkeet Ruosteisen Raudan monipuolisesta valikoimasta. Ahola on 12 metriä korkea moniulotteinen rakennus, oikea taideteos, joka toteutettiin Arkkitehtitoimisto Ainutlaatuinen koti Oy:n suunnitelmien pohjalta. ",
        "Jussi Ahola kommentoi rakennusprojektiaan seuraavasti: ”Rakentaminen oli helppoa ja nopeaa Ruosteisen Raudan avulla. Monipuolinen valikoima mahdollisti kaikkien tarvikkeiden hankinnan yhdestä ja samasta paikasta, jolloin säästin kustannuksista ja sain aina kokonaisvaltaista palvelua kaikkiin rakentamiseen liittyviin kysymyksiin ja palveluihin liittyen. Suosittelen Ruosteisen Raudan valikoimaa lämpimästi kaikille rakentajille pieniin ja isoihin projekteihin.”",
    ],
}

document.addEventListener("DOMContentLoaded", function () {
    const btn_referenssit = document.getElementsByClassName("btn_referenssi");
    const referenssiTekstit = document.getElementById("referenssi-text");
    const carouselElement = document.getElementById("carousel-ref");
    const historiaElement = document.getElementById("collapseHistoria");
    const collapseHistoriaArrow = document.getElementById("collapse-arrow-historia");
    const collapseMeista = document.getElementById("collapseMeista");
    const collapseMeistaArrow = document.getElementById("collapse-arrow-meista");

    function updateText(index) {
        const texts = referenssit[index];
        referenssiTekstit.innerHTML = "";

        texts.forEach((text) => {
            const p = document.createElement('p');
            p.append(text);
            referenssiTekstit.append(p);
        })

    }

    Array.from(btn_referenssit).forEach(btn => {
        const index = btn.getAttribute('data-bs-slide-to');
        if (index !== null) {
            btn.addEventListener("click", function () {
                updateText(index)
            });
        }
    });

    carouselElement.addEventListener('slide.bs.carousel', function (event) {
        const index = event.to;
        updateText(index);
    });

    historiaElement.addEventListener('show.bs.collapse', function (event) {
        collapseHistoriaArrow.className = "bi bi-arrow-bar-up";
    });

    historiaElement.addEventListener('hide.bs.collapse', function (event) {
        collapseHistoriaArrow.className = "bi bi-arrow-bar-down";
    });

    collapseMeista.addEventListener('show.bs.collapse', function (event) {
        collapseMeistaArrow.className = "bi bi-arrow-bar-up";
    });

    collapseMeista.addEventListener('hide.bs.collapse', function (event) {
        collapseMeistaArrow.className = "bi bi-arrow-bar-down";
    });

    document.querySelectorAll('.palvelu-collapse').forEach((element) => {
        const index = element.dataset.arrow_index;
        const arrow = document.getElementById(`collapse-palvelu-arrow-${index}`);

        console.log(element)

        element.addEventListener('show.bs.collapse', function (event) {
            arrow.className = "bi bi-arrow-bar-up";
        });

        element.addEventListener('hide.bs.collapse', function (event) {
            arrow.className = "bi bi-arrow-bar-down";
        });
    })

    updateText(0);
})
