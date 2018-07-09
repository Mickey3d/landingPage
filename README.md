# landingPage


SCSS normes ITCSS + BMM

Docker + symfony 4

Rendu Responsive : Media Queries


____________________________________________________________________________________________________

Normes ITCSS

Settings – used with preprocessors and contain font, colors definitions, etc.
Tools – globally used mixins and functions. It’s important not to output any CSS in the first 2 layers.
Generic – reset and/or normalize styles, box-sizing definition, etc. This is the first layer which generates actual CSS.
Elements – styling for bare HTML elements (like H1, A, etc.). These come with default styling from the browser so we can redefine them here.
Objects – class-based selectors which define undecorated design patterns, for example media object known from OOCSS
Components – specific UI components. This is where majority of our work takes place and our UI components are often composed of Objects and Components
Utilities – utilities and helper classes with ability to override anything which goes before in the triangle, eg. hide helper class

Convention BMM
____________________________________________________________________________________________________

____________________________________________________________________________________________________

Planing

- Etude

- Découpage de la maquette (photoshop)
- Récupération des Images et Icones (photoshop)
- Récupération des textes (photoshop + éditeur de texte)
Mode HTML - CSS - SCSS
- Structure des Dossiers
- Squelette Html
- Mini CSS repère
Contruction du Framework SCSS
- icons.scss dans dossier assets/icon/scss
- main.scss dans dossier assets/style/scss
- Inclusion de la norme ITCSS et création des fichier scss correspondant
Contruction de la landing page
- Inclusion du css dans html
- test
- reprise
Migration Symfony
- Instalaton de symfony 4
- Instalation des Modules (twig ... faire liste)
- Création d'un landingController pour la gestion de la landing page
- Integration du template avec twig dans dossier template/theme/hello
- Ajout des entités corespondant aux sections du template pour administration des textes

-- GLOBAL
-- NAV
-- HEADER & SLIDER
-- SERVICES
-- PORTOFOLIO
-- FOOTER

___________________________________________________________________________________________________

