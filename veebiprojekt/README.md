# veebiprojekt
Rühma liikmed: Sander Sats, Kadri Moks, Martin Salus

Otsustasime projektiks valida E-hääletuse.
Prototüübiks tegime html-mockupi. Mockupis on piiratud navigeerimisvõimalused. Peamistesse vaadetesse liikumine käib läbi menüü.
Mockup asub http://web.zone.ee/veebiprojekt/

Testkeskkonna url: http://dev.newtime.ee/veebiprojekt/

Olemas on 3 tüüpi kasutajad: sisse logimata kasutaja, sisse logitud kasutaja ja admin.

Sisse logimata kasutaja pääseb ligi kandidaatide (sealhulgas ka otsing) ja statistika (ehk hääletuse tulemuste) vaadetele.

Et ülejäänud vaadetele ligi pääseda peab sisse logima (vajuta logi sisse ja avanevast aknast uuesti logi sisse - kasutajat ega parooli praegu sisestama ei pea).

Sisse logimine viib kasutaja dashboardi, kus on kandideeri ja hääleta (hääleta link on ka menüüs). Samuti on nüüd menüüs juures süsteemi haldus (ainult admin kasutaja puhul).

Hääletamise lehel saab saab valida, millise kandidaadi poolt tahad hääletada. Samuti kuvatakse kandidaat, kelle poolt juba oled hääletanud ning võimalus hääletus tühistada.

Kandideerimise lehel saab valida piirkonna ning esitada kanditatuuri.

Süsteemi halduse all saab admin lisada kasutajaid, parteisi ja piirkondi (vastavatele nuppudele vajutades ilmuvad vormid).