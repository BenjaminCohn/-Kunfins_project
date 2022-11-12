-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 nov. 2022 à 08:53
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bass_player_rank`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `idArtiste` int(11) NOT NULL,
  `nomArtiste` varchar(255) NOT NULL,
  `prenomArtiste` varchar(255) NOT NULL,
  `groupeArtiste` varchar(255) NOT NULL,
  `descArtiste` text NOT NULL,
  `imgArtiste` varchar(255) NOT NULL,
  `idStyle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`idArtiste`, `nomArtiste`, `prenomArtiste`, `groupeArtiste`, `descArtiste`, `imgArtiste`, `idStyle`) VALUES
(1, 'Kerr', 'Mike', 'Royal Blood', '\"Sound Finder\" : La première fois que nous avons écouté Royal Blood, donc Mike Kerr, c\'était une découverte Ouï Rock FM et nous avons réellement pris une claque! Quel son ! Tout droit sorti de l\'espace. Et en plus, une voix qui chante et bien. Très bien même! Nous devons ce chef d\'oeuvre à Mike Kerr, bassiste et chanteur ainsi qu\'à Ben Thatcher à la batterie.\r\n\r\nLe groupe se forme en 2013 à Worthing en Angleterre. Leur première date arrive deux jours après le retour de Mike d\'Australie. Ce dernier étant parti pour un \"job d\'été\" et découvrir le monde.\r\n\r\nLors du festival Glastonbury, le batteur d\'Arctic Monkey est aperçu avec un t-shirt Royal Blood lors de l\'été 2013. En novembre, les Royal Blood font leur première partie.', 'http://www.music-news.com/images/news/bang/139795.jpg', 2),
(2, 'Flea', '', 'Red Hot Chili Peppers', 'Alors qu’il n’a que quatre ans, ses parents divorcent et sa mère se remarie en 1967 avec un musicien new-yorkais de jazz, Urban Walter Jr, « alcoolique, junkie et très violent » selon les dires de Flea aujourd’hui. Ce jazzman initie Flea à la musique qui va prendre une place de la première importance dans la vie du jeune Michael.\r\n\r\nCette même année, il déménage avec sa mère, son beau-père et sa sœur à New York. La première chose dont il se souvient est la cabine du bateau en provenance de Melbourne qu’il s’est pris sur la figure, lorsqu’il voulait admirer la Statue de la Liberté. C’est à partir de ce moment-là que Michael, sous l’influence de son beau-père, s’initie au jazz et à la soul music. La famille Balzary emménage dans une grande maison où de nombreux musiciens amis de Walter viennent pour des jams sessions. En assistant à ces concerts improvisés des grands noms du jazz chez lui, Michael décide de faire lui aussi de la musique.\r\n\r\nIl s\'essaie d\'abord à la batterie, puis commence la trompette à l\'âge de dix ans, sur le conseil d\'Urban. Il écoute les maîtres du jazz : Miles Davis, Charlie Mingus, Louis Armstrong, … Flea garde le souvenir de cette période émaillée des bêtises qu’il a pu faire à cette époque, à 9-10 ans : petits cambriolages pour les gangs du Bronx, vols de pièces de voitures, deal de drogues… Un des grands moments de cette période demeure sa rencontre, en 1973, avec son idole Dizzy Gillespie en backstage après un concert, grâce à sa mère : pendant un quart d’heure, le jeune trompettiste a pu témoigner de son amour pour le jazz, la musique et pour Dizzy lui-même qui fut d’ailleurs très touché. Ils trouvèrent même le temps d’échanger quelques notes à la trompette par la suite. En raison des tournées de Walter à travers les États-Unis, la famille Balzary déménage à Los Angeles en 1973. Âgé de 11 ans, il est inscrit à la Bancroft Junior School et il se souvient : « Je suis arrivé d\'Australie en 1972 et depuis lors Los Angeles s\'est convertie en une cochonnerie, dans tous les sens du terme2. »\r\n\r\nDans l\'émission Behind The Music sur VH1, il a confessé qu\'au début il ne s\'intéressait pas au rock et voulait devenir musicien de jazz comme son beau-père mais a changé d\'avis après avoir découvert la musique de Kiss, Jimi Hendrix et Led Zeppelin par l\'intermédiaire d\'Hillel Slovak, futur membre des Red Hot Chili Peppers. Il devient rapidement, grâce à de nombreuses heures de travail consacrées quotidiennement à la trompette l’élève préféré de ses professeurs de musique. Ces derniers le considèrent même comme le meilleur trompettiste qu’ils aient eu depuis Harv Helbert (qui fréquentait l\'établissement quelques années plus tôt).\r\n\r\nIl rencontre Anthony Kiedis alors qu\'il fréquente le lycée Fairfax, et commence à jouer de la basse à l\'âge de 17 ans pour remplacer le bassiste du groupe Anthym fondé par ses amis Hillel Slovak, Jack Irons et Alain Johannes. En 1981, il quitte ce groupe à la recherche de nouvelles expériences musicales. Il rejoint ensuite le groupe Fear, groupe de punk de Los Angeles. En 1983, avec Kiedis, Slovak et Irons ils forment le groupe Red Hot Chili Peppers. À l\'époque, il refuse une offre de son idole Johnny Rotten des Sex Pistols qui lui propose de le rejoindre dans son nouveau groupe Public Image Limited, pour pouvoir rester avec ses amis des Red Hot Chili Peppers.', 'https://i.guim.co.uk/img/media/f913c1031483a89e1db110492f191d0b757fb058/422_225_1827_1096/master/1827.jpg?width=620&quality=85&fit=max&s=11b17b2f3d87919f31e33c640bdf1b13', 2),
(3, 'Wolstenholme', 'Christopher Tony', 'Muse', 'Chris a grandi à Rotherham avant de s\'installer dans le Devon, région natale de sa mère, en 1989 à l\'âge de onze ans. Vers douze ans, il intègre un groupe de musique, Fixed Penalty, dans son lycée, en tant que batteur. Il sait déjà jouer de la guitare et de la batterie lorsque Matthew Bellamy et Dominic Howard lui proposent le rôle de bassiste afin d\'intégrer leur groupe. Cette proposition fut faite à la suite d\'une prestation de Chris jouant de la batterie tout en chantant juste, avec son premier groupe ce qui impressionna Matthew Bellamy et Dominic Howard.\r\n\r\nChris accepte la proposition et apprend seul un nouvel instrument : la guitare basse. Le trio a joué quelques petits concerts sous le nom de Rocket Baby Dolls, avant que le groupe ne change de nom et donne ses premiers concerts sous le nom de Muse.\r\n\r\nChristopher est le plus jeune des membres du groupe. Il est séparé de sa femme, Kelly avec qui il a eu six enfants : Alfie (né le 7 juillet 1999), Ava-Jo (née le 31 décembre 2001), Frankie (né le 26 août 2003), Ernie (né le 19 octobre 2008), Buster (né le 4 novembre 2010) et Teddi Dorothy (née le 5 janvier 2012). Le groupe déplaça quelques dates de leurs concerts prévus aux États-Unis à l\'automne 2010, afin que le bassiste puisse assister à la naissance de son cinquième enfant.\r\n\r\nBien que très attaché à la tranquillité du Devon, bien plus appropriée selon lui pour sa famille, il décide d’emménager à Dublin en avril 2010 avec son ex-épouse Kelly et leurs enfants. Il explique ce choix par le besoin d\'être proche d\'un aéroport international tout en confirmant qu\'il souhaitait éviter Londres. Cependant, il a été confirmé que lui et sa famille avaient emménagé à Londres, après que le groupe ait émis le souhait de composer leur prochain album tout en vivant tous dans la même ville. Il y vit toujours et est désormais en couple avec une certaine Caris Ball depuis 2017, avec qui il entretenait une amitié de longue date. Ils se sont mariés le 1er décembre 2018. Il a eu avec elle son septième enfant, une fille, Mabel Aurora Ball (née le 3 mars 2020). Le 29 octobre 2021, Chris a eu un nouvel enfant avec Caris Ball, Duke Buddy Ball Wolstenholme (Chris a donc 8 enfants dont 6 de son union avec Kelly, tandis que Caris en a 4 dont 2 d\'une union précédente).', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Chris_Wolstenholme_in_2013_%28cropped%29.jpg/800px-Chris_Wolstenholme_in_2013_%28cropped%29.jpg', 2),
(4, 'Glover', 'Roger', 'Deep Purple', 'Ses parents tiennent à Londres un pub où jouent fréquemment des groupes de rock. Après 6 ans de piano, il se met à la guitare acoustique puis à la basse.\r\n\r\nSon premier groupe s\'appelle les Madison qui formeront en 1963, après une fusion avec les Lightnings, un autre groupe du même lycée que celui de Glover, Episode Six.\r\n\r\nEn mai 1965, le groupe devient professionnel avec l\'arrivée de Ian Gillan. Il a vu passer en son sein Mike Underwood (déjà vu avec Ritchie Blackmore).\r\n\r\nLe 7 juin 1969, Ian Gillan enregistre avec Deep Purple le single Hallelujah (à l\'insu de Nick Simper et Rod Evans) et Roger Glover est convoqué comme musicien de studio. Une semaine après il intègre Deep Purple. Il restera membre du groupe jusqu\'en 1973. C\'est lui qui aura l\'idée du titre du morceau légendaire du groupe : Smoke on the Water, dont l\'histoire relate l\'incendie du Casino de Montreux. Il est à nouveau membre du groupe lors de son retour en 1984 avec l\'album Perfect Strangers, après avoir joué dans le groupe de Ritchie Blackmore, Rainbow, entre 1979 et 1983.\r\n\r\nEn 1974, il obtient son plus grand succès solo avec le titre Love is All, chanson phare de son album The Butterfly Ball and the Grasshopper\'s Feast plus connu sous son nom abrégé de Butterfly Ball et produit, à la fin de l\'année 1976, le single \'Wild side of life\' de Status Quo .\r\n\r\nRoger Glover utilise, depuis 1996, les basses de fabrication française Vigier. Son modèle, l\'Excess Roger Glover [archive] est commercialisé depuis 2006.\r\n\r\nDepuis le début des années 1970, Roger Glover est également producteur. L\'essentiel de sa production se situe entre 1972 et 1984 avec Rory Gallagher et Nazareth. Il a également produit des albums de Rainbow et de Deep Purple depuis la reformation de celui-ci.\r\n\r\nVers les années 1990 (1991), en France, une marque de sirop associe son image avec la chanson Love is all, et un spot publicitaire reprenant les images du clip officiel. Sironimo est la marque de ce sirop, qui avait des bouteilles en formes de quilles.\r\n\r\nLe 8 avril 2016, Deep Purple est intronisé au Rock and Roll Hall of Fame : Roger Glover est récompensé en même temps que Ritchie Blackmore, Ian Gillan, Ian Paice, Rod Evans, David Coverdale, Glenn Hughes et Jon Lord à titre posthume.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Deep_Purple_-_MN_Gredos_-_03.jpg/1024px-Deep_Purple_-_MN_Gredos_-_03.jpg', 2),
(5, 'Pastorius', 'Jaco', '', 'John Francis, dit Jaco Pastorius, nait en 1951 en Pennsylvanie2. Son père, musicien professionnel (batteur et chanteur)2 est d\'origine allemande et sa mère d\'origine finnoise. Il a 7 ans quand sa famille s\'installe en Floride2. Jaco Pastorius y passe son enfance et s\'imprègne de toutes les musiques qu\'il peut entendre (musique des Caraïbes, jazz, rhythm and blues, rock…).\r\n\r\nIl va à l\'école élémentaire à la St. Clement Catholic School, puis au lycée au Northeast High à Oakland Park. Sportif accompli, il pratique de nombreux sports, dont le football américain, le basket-ball, le baseball. Son arrogance lui vaut des déboires assez tôt. À 13 ans, il se casse le poignet en jouant au football ce qui aura pour conséquence d\'entraver durablement son aptitude à jouer de la batterie2.\r\n\r\nIl s\'initie au piano, à la guitare et même au saxophone2. À 15 ans, après une nouvelle opération au bras, il adopte définitivement la basse. Il utilise une basse fretless qu\'il se bricole à partir d\'une Fender Jazz Bass 1962 dont il enlève les frettes, recouvre le manche de plusieurs couches d\'un vernis époxy et y adapte dans un premier temps des cordes flat wounds (pour sonner comme une contrebasse), puis des cordes round wounds de marque Rotosound modèle Swing Bass 66 (qui donneront l\'originalité de sa sonorité de basse fretless).\r\n\r\nIl débute dans des orchestres locaux, notamment « La Olas Brass »2, un groupe de cuivres de neuf musiciens, spécialisé dans les reprises d\'Aretha Franklin, Otis Redding, Wilson Pickett, James Brown et le Tijuana Brass. Après le départ de son bassiste David Neubauer, il le remplace et commence son ascension irrésistible de bassiste légendaire. Il joue, un temps, sur des bateaux de croisière (il va croiser les musiciens des Wailers et découvrir le reggae en Jamaïque)2. Il fait une très longue tournée avec les C.C. Riders (alias The Cochran\'s Circuit Riders), le groupe du chanteur Wayne Cochran2. Pastorius considérera toujours cette tournée comme la période la plus heureuse de sa vie.', 'https://upload.wikimedia.org/wikipedia/commons/b/b6/Jaco_Pastorius_with_bass_1980.jpg', 1),
(6, 'Commerford', 'Tim', 'Rage Against the Machine, Audioslave, Prophets of Rage', 'Timothy Commerford est né le 26 février 1968 et est le cadet d\'une famille de 5 enfants, fils d\'un ingénieur en aéronautique et d\'une mère mathématicienne. Il grandit à Irvine, Californie, où il rencontre son ami Zack de la Rocha de deux ans plus jeune à l\'école primaire. D\'ailleurs, c\'est Zack qui pousse le jeune Tim âgé de 15 ans à se mettre à la basse. La basse lui sert en même temps d\'exutoire face à une situation familiale très difficile durant cette même période : sa mère vient de découvrir qu\'elle a un cancer et son père, nullement attendri par la nouvelle, divorce pour épouser une autre femme. Malheureusement, Tim ne peut qu\'assister à la mort de sa mère, tuée par sa tumeur au cerveau en 1988, alors qu\'il a tout juste 20 ans.\r\nÀ la fois grand amateur de jazz, fan de hip hop (grande influence de Cypress Hill et de NWA qu\'on retrouvera dans les choix de reprises de l\'album Renegades) et de rock (dont Jimi Hendrix), Tim Commerford est réputé pour son groove, la puissance et la qualité de ses effets (dans Calm Like a Bomb par exemple).\r\n\r\nIl utilise principalement deux Jim Dunlop Cry Baby 105Q Bass Wah comme pédales mais aussi une Marshall Guv\'nor (avec Rage Against the Machine de 1991 à 1998) ainsi qu\'une BOSS DD-3, une BOSS OC-2, une MRX Phase 90 avec RATM et plus récemment une Aphex Punch Factory avec Audioslave.\r\n\r\nSon jeu est très varié, alliant rapidité, puissance et technique (le slap sur Take the Power Back par exemple), a fait de Rage Against the Machine l\'une des sections rythmiques les plus réputées parmi les groupes de nu metal/fusion des années 1990.', 'https://pbs.twimg.com/media/EvLF9faUcAEI1yX?format=jpg&name=medium', 2),
(7, 'Bona', 'Richard', '', 'Richard Bona naît en 1967 à Minta au Cameroun, dans une famille de musiciens. Son grand-père est chanteur et percussionniste, sa mère, également chanteuse. À quatre ans, il s\'initie au balafon. Dès cinq ans, il se produit dans l\'église de son village (Paroisse Sainte-Croix de Minta). Son talent est vite remarqué et il anime fêtes et cérémonies. D\'un milieu pauvre, il utilise des câbles de frein volés dans un magasin de cycles pour se fabriquer une guitare. Sa famille s\'installe à Douala. Bona sèche régulièrement les cours pour s\'entraîner. Le soir, il fait le bœuf dans les clubs de la ville et joue notamment avec Messi Martin1. En 1980, il monte son premier orchestre pour un club de jazz de Douala tenu par un Français. Le propriétaire lui fait découvrir le jazz et notamment Jaco Pastorius. Il décide alors de jouer de la basse.', 'https://upload.wikimedia.org/wikipedia/commons/f/fd/Richard_Bona_in_2009.jpg', 1),
(8, 'Miller', 'Marcus', 'David Sanborn, Luther Vandross, Miles Davis, The jamaica Boys', 'Le père de Marcus Miller jouait du piano et de l\'orgue à l\'église, et il a appris à son fils à jouer de ces instruments. À environ dix ans, le jeune Marcus apprend à jouer de la clarinette. Son apprentissage de la guitare basse commence peu après, alors qu\'il a douze ans. Il en apprend les rudiments seul en appliquant à cet instrument les connaissances théoriques acquises lors de son approche de la clarinette. Il a déjà à cette époque l\'ambition de devenir un musicien professionnel. Vers l\'âge de 22 ans, il commence à créer un style qui lui est propre. Sa carrière commence peu après grâce à Miles Davis.\r\n\r\nEn 1987, il participe à l\'album Nougayork de Claude Nougaro, en tant que sideman. En 1994 il produit l\'album Tenderness d\'Al Jarreau enregistré live en studio et pour lequel collaborent Paulinho Da Costa, Steve Gadd, Joe Sample, Eric Gale ou encore David Sanborn.\r\n\r\nEn 1996, il apparaît comme producteur d\'une des chansons du dernier album studio enregistré par France Gall, France : La Minute de silence, qu\'il teinte de blues. Il travaille également avec Aretha Franklin sur l\'album Jump To It et avec Luther Vandross sur plusieurs de ses albums. En 2008 il enregistre un album avec Stanley Clarke et Victor Wooten (deux autres grands bassistes) nommé SMV Thunder.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Marcus_Miller_at_Stockholm_Jazz_Fest_2009.jpg/1024px-Marcus_Miller_at_Stockholm_Jazz_Fest_2009.jpg', 1),
(9, 'Clarke', 'Stanley', 'SMV', 'À l\'âge de 18 ans, il intègre en tant que contrebassiste la formation du pianiste Horace Silver et commence à se forger une réputation dans le milieu jazz. Au début des années 1970, il accompagne le saxophoniste Joe Henderson durant un an. Clarke joue également pour Pharoah Sanders et Stan Getz. Grâce à ce dernier, le contrebassiste fait la connaissance du claviériste Chick Corea avec lequel il fonde le groupe de jazz fusion Return to Forever en 1972. Clarke participe à l\'enregistrement de plusieurs albums du groupe et entame également une carrière solo en tant que bassiste de jazz-rock. Il tourne avec sa propre formation dès 1976.\r\n\r\nClarke se produit avec des musiciens rock comme Jeff Beck, ou encore les guitaristes Ron Wood et Keith Richards des Rolling Stones, qu\'il côtoie au sein des The New Barbarians. Durant les années 1980, il enregistre avec le claviériste George Duke et avec le groupe Animal Logic (en), également composé du batteur Stewart Copeland et de la chanteuse Deborah Holland. En 1980 et 1981, il enregistre deux albums avec le supergroupe Fuse One (en), composé par John McLaughlin, Eric Gale, Lenny White, Tom Browne, Stanley Turrentine, Wynton Marsalis et George Benson. En 1995, il joue sur l\'album The Rite of Strings avec le guitariste Al Di Meola et le violoniste Jean-Luc Ponty.\r\n\r\nClarke compose également pour le cinéma et la télévision. Durant les années 1990 il signe la musique de plusieurs films, dont Boyz N the Hood et Poetic Justice de John Singleton, Passager 57 de Kevin Hooks, ou encore Little Big League d\'Andrew Scheinman.\r\n\r\nDepuis 2008, il fait partie du groupe de bassistes SMV avec Marcus Miller et Victor Wooten.', 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Stanley_Clarke_July_5_1979.jpg', 1),
(10, 'Spalding', 'Esperanza', '', 'Esperanza Spalding, qui a grandi dans le quartier ouvrier de King à Portland, est issue d\'une famille métissée, sa mère est d\'ascendance galloise et hispanique et son père est afro-américain. Sa mère, qui élève seule ses deux enfants, l\'encourage très tôt à travailler ses qualités musicales. C\'est en écoutant le violoncelliste Yo-Yo Ma qui passait sur la série télévisée pour enfants Mister Rogers\' Neighborhood quand elle avait quatre ans que Spalding s\'oriente vers l\'apprentissage de la musique et du violoncelle.\r\n\r\nTout d\'abord violoniste (dès l\'âge de 5 ans), elle intègre un orchestre local, l\'Oregon Sinfonietta de la Chamber Music Society of Oregon sous la direction de Thara Memory, où elle restera jusqu\'à ses 15 ans. Elle découvre la contrebasse et ses possibilités d\'expression artistique. Elle suit ses études secondaires à The Northwest Academy (en) située dans le centre de Portland, établissement spécialisé dans l\'enseignement artistique5. Élève précoce, elle achève à 12 ans ses études secondaires pour suivre des cours supérieurs de musique à l\'Université de Portland, où elle obtient son Bachelor of Music (licence) à ses 16 ans. Elle y reçoit une formation classique de niveau conservatoire supérieur de musique tout en travaillant le jazz, notamment grâce aux cours de contrebasse d\'André St. James. Elle obtient ensuite une bourse pour intégrer l\'institut d\'enseignement supérieur de musique le Berklee College of Music de Boston.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Esperanza_Spalding_on_North_Sea_Jazz_2012.JPG/800px-Esperanza_Spalding_on_North_Sea_Jazz_2012.JPG', 1),
(11, 'Davis', 'Steve', '', 'Steve Davis (1929-1987), également connu sous son nom musulman de Luquman Abdul Syeed était un bassiste de jazz très actif dans les années 1960.\r\n\r\nEn 1960, il fait brièvement partie du quatuor de John Coltrane, avant d\'être remplacé par Reggie Workman. Il est essentiellement connu pour sa participation à l\'album mythique My Favorite Things avec trois membres du futur quatuor de John Coltrane. Il a également enregistré en tant que sideman avec Chuck et Gap Mangione sur Hey Baby !, et avec son ami de quatuor (et beau-frère) McCoy Tyner sur l\'album Nights of Ballads & Blues.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Steve_Davis_on_bass_%26_Tom_Whaley_on_drums.jpg/800px-Steve_Davis_on_bass_%26_Tom_Whaley_on_drums.jpg', 1),
(12, 'Kilmister', 'Lemmy', 'Motorhead', 'Lemmy est né à Burslem, en Angleterre. Son père, un ancien aumônier de la Royal Air Force, se sépare de sa mère alors qu\'il n\'a que trois mois. Lemmy la suit, avec sa grand-mère, à Newcastle-under-Lyme, puis à Madeley, dans le Staffordshire.\r\n\r\nL\'année de ses dix ans, sa mère se marie à George Willis, père de deux enfants issus d\'un précédent mariage, Patricia et Tony, avec qui Lemmy s\'entend mal. La famille recomposée déménage à Benllech, Anglesey, en Galles du Nord, et c\'est précisément à cette époque qu\'il commence à éprouver un intérêt grandissant pour le rock \'n\' roll naissant, les filles et les chevaux. C\'est à l\'école Ysgol Syr Thomas Jones d\'Amlwch qu\'il acquiert son surnom de Lemmy, en référence à l\'expression anglaise lend me a fiver (raccourci en « Lemme ») signifiant « Prête-moi un biffeton ». Face aux difficultés financières de la famille bridant son addiction aux jeux de hasard — particulièrement les machines à sous — il se voit dans l\'obligation de demander de l\'argent à ses camarades.\r\n\r\nÀ 16 ans, il découvre les Beatles, qui jouent au Cavern Club, et il se met à apprendre la guitare aux sons de leur premier album Please Please Me. Il apprécie particulièrement l\'attitude sarcastique du groupe, et notamment celle de John Lennon. Lemmy quitte l\'école au moment où sa famille déménage à nouveau à Conwy ; il enchaîne alors plusieurs petits boulots, notamment dans une usine d\'électroménager, en jouant de la guitare pour des groupes locaux, dont les Sundowners. C\'est en pratiquant l\'équitation, à 17 ans, que Lemmy fait la connaissance de Cath, qu\'il suivra jusqu’à Stockport, Cheshire, et avec qui il aura son premier fils, Sean.', 'https://upload.wikimedia.org/wikipedia/commons/8/84/Lemmy-02.jpg', 3),
(13, 'DiGiorgio', 'Steve', 'Sadus, Testament, Death', 'Steve DiGiorgio, né le 7 novembre 1967 à Waukegan, Illinois, est un bassiste américain de heavy metal et de death metal. Il est connu pour son jeu technique et est un des rares joueurs de basse fretless dans le milieu metal. Il est en autres connu pour avoir joué dans Death et pour faire actuellement partie de Testament.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/2017_Testament_-_Steve_Di_Giorgio_-_by_2eight_-_DSC9239.jpg/800px-2017_Testament_-_Steve_Di_Giorgio_-_by_2eight_-_DSC9239.jpg', 3),
(14, 'Myung', 'John', 'Dream Theater, Platypus', 'Né à Chicago de parents coréens, il commence à jouer du violon à partir de l\'âge de cinq ans puis se met à la basse à quinze ans. Il va ensuite à l\'école de musique Berklee College of Music située à Boston où il rencontre Mike Portnoy et John Petrucci. Avec le claviériste Kevin Moore et le chanteur Chris Collins ils forment le groupe Majesty, qui produira l\'album-démo Majesty avant de se renommer Dream Theater car le nom du groupe était déjà utilisé.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/John_Myung_-_02.jpg/800px-John_Myung_-_02.jpg', 3),
(15, 'Butler', 'Geezer', 'Black Sabbath', 'Sa famille est d\'origine catholique irlandaise.\r\n\r\nDe nombreux débats entre les fans ont encore lieu pour savoir qui de Tony Iommi ou de Geezer Butler est à l\'origine du son de Black Sabbath. Geezer est aussi l\'auteur des paroles du groupe durant l\'ère Ozzy Osbourne, tournant souvent autour de thèmes sombres comme la mort et le mal. Ces thèmes sont abordés sous un angle positif, traitant de luttes réussies (ou non) contre le Démon, et font office de mises en garde contre les tendances sataniques et d\'incitations à lutter contre elles. Lorsque Ronnie James Dio succède à Osbourne au micro de Black Sabbath, Butler lui laisse la tâche d\'écrire les paroles, qui prennent alors une orientation plus « Heroic fantasy ».\r\n\r\nLa toute première chanson que Geezer écrit avec Black Sabbath est la pièce éponyme sur le premier album. Elle est écrite après qu\'Ozzy eut offert à Geezer un livre traitant de l\'occultisme. En lisant ce livre, Geezer prétend avoir vu apparaitre autour de lui des démons noirs. Depuis, il s\'est écarté de ses penchants pour l\'occulte dont il cherche à en prévenir les dégâts dans des chansons comme Black Sabbath, After Forever ou encore Lord of This World). Il faut savoir que les relations ambigües entre Black Sabbath et l\'occultisme sont voulues et peuvent être considérées comme une provocation comme une autre, simplement destinée à choquer l\'Angleterre puritaine de la fin des années 1960 et 1970.\r\n\r\nSon groupe et lui-même se sont engagés politiquement pendant la guerre du Viêt-Nâm, entre autres par des chansons comme Wicked World, Into The Void, Under the Sun, Hand of Doom et (comme l\'indique le titre) War Pigs (War Pigs aurait dû être le titre de l\'album Paranoïd, mais le label américain n\'en a pas voulu ainsi, car ce titre est trop critique vis-à-vis du comportement des Américains au Viêt-Nâm).\r\n\r\nButler est membre de Black Sabbath entre 1969 et 1984, participant à l\'ensemble des albums enregistrés au cours de cette période. Il avait auparavant envisagé son départ dès 1979, mais était revenu sur sa décision après avoir pris connaissance du travail effectué par Ronnie James Dio et Tony Iommi sur l\'album à succès Heaven and Hell. Il fait son retour au sein du groupe en même temps que Dio en 1990, avant de repartir à nouveau en 1994 pour ensuite réintégrer définitivement Sabbath dès 1997 à l\'occasion du retour de la formation classique des années 1970.\r\n\r\nEntre 2006 et 2010, Geezer Butler est également membre du groupe Heaven & Hell, dernier avatar de Black Sabbath aux côtés de Tony Iommi, Ronnie James Dio et Vinny Appice. Cette formation sera dissoute à la suite du décès de Dio en mai 2010.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/2019_RiP_Deadland_Ritual_-_Geezer_Butler_-_by_2eight_-_8SC9916.jpg/800px-2019_RiP_Deadland_Ritual_-_Geezer_Butler_-_by_2eight_-_8SC9916.jpg', 3),
(16, 'Ellefson', 'David', 'Megadeath', 'Il est très jeune plongé dans le monde de la musique, et apprend dès son plus jeune âge à jouer du saxophone et du piano mais c\'est vers la guitare et surtout vers la basse qu\'il va se spécialiser.\r\nAprès avoir joué dans plusieurs petits groupes, il déménage à l\'âge de 18 ans à Los Angeles. C\'est là qu\'il rencontrera Dave Mustaine, qui habite l\'appartement au-dessus du sien. Lorsque Dave lui fait écouter les démos qu\'il a enregistrées avec Metallica (groupe dont il vient d\'être écarté), Ellefson décide de monter un groupe avec lui.\r\n\r\nC\'est ainsi que se crée Megadeth qui publie son premier album en 1985, et qui va connaitre un succès planétaire au cours des années 90. Au fil des ans et des changements au sein du groupe, il apparait que Dave Mustaine et David Ellefson vont constituer la véritable ossature du groupe.\r\n\r\nMais en 2002, Dave Mustaine, blessé au bras annonce la fin de Megadeth, ce qui va créer un conflit entre les deux hommes. Lorsque le groupe se reforme en 2004, David renonce à réintégrer le groupe et poursuivra même le leader du groupe pour des royalties impayées.', 'https://upload.wikimedia.org/wikipedia/commons/9/99/Megadeth_%40_Arena_Joondalup.jpg', 3),
(17, 'Burton', 'Cliff', 'Metallica', 'Clifford Lee Burton est né de Ray (1928-2020) et Jan Burton. Il avait un frère, Scott et une sœur Connie. L\'intérêt de Burton pour la musique s\'éveille lorsque son père l\'initie à la musique classique et commence à prendre des leçons de piano. Durant son adolescence, Burton s\'intéresse au rock, à la musique classique et finalement au heavy metal. Il a commencé à jouer de la basse à 13 ans, après la mort de son frère. Ses parents ont rapporté de lui qu\'il disait vouloir « être le meilleur des bassistes, pour mon frère ». Il pratiquait son instrument jusqu\'à six heures par jour même après avoir rejoint Metallica.\r\n\r\nAvec la musique classique et le jazz, les autres premières influences de Burton variaient du rock sudiste, à la country en passant par le blues. Burton a également cité Geezer Butler de Black Sabbath, The Misfits, Phil Lynott et Thin Lizzy, ainsi que Geddy Lee de Rush comme influences sur sa façon de jouer.', 'https://www.udiscovermusic.com/wp-content/uploads/2022/02/Cliff-Burton-Ross-Marino-copy-1000x600.jpg', 3),
(18, 'Edwards', 'Bernard', 'Chic, The Power Station', 'Bernard Edwards est né à Greenville en Caroline du Nord, mais il a grandi à Brooklyn, New York City.\r\n\r\nIl fait la connaissance de Nile Rodgers au début des années 1970. Leur dénominateur commun est alors le jazz. Ils forment The Big Apple Band (1972–1976) avec le batteur Tony Thompson et le chanteur Bobby Cotter, avant de créer Chic avec la chanteuse Norma Jean Wright.\r\n\r\nOn doit à Bernard Edwards un véritable renouveau de la basse dans la musique funk/pop. Avec son groupe Chic, la basse n\'est plus reléguée comme accessoire mais fait partie intégrante de la musique, largement mise en avant en duo avec le jeu de guitare de Nile Rodgers.\r\n\r\nLe fameux tube Le Freak (1978) de Chic est un bon exemple où l\'on peut entendre la basse omniprésente d\'Edwards. Mais c\'est surtout avec le tube Good Times (1979) que Bernard Edwards magnifie le jeu de la basse avec une ligne qui soutient tout le morceau, qui est en fait sa \"signature\", et qui sera ensuite largement reprise et copiée par d\'autres groupes comme Sugarhill Gang avec le rap Rapper\'s Delight ou Queen avec le titre Another One Bites The Dust\r\n\r\nDans son autobiographie, Nile Rodgers évoque la capacité d\'Edwards à sortir une ligne de basse en 2 mouvements\r\n\r\nEn dehors du groupe Chic, Rodgers et Edwards furent aussi producteurs, compositeurs et interprètes pour d\'autres artistes, on peut citer :\r\n\r\nDiana Ross : Upside Down, I\'m Coming Out\r\nDavid Bowie : Let\'s dance\r\nSister Sledge : We are family, He\'s the greatest dancer\r\nSheila B Devotion : Spacer\r\nDeborah Harry (Blondie) : Backfired\r\n\r\nEn solo, Bernard Edwards a produit ou joué de sa basse très recherchée pour de nombreux artistes : David Bowie, Mick Jagger, Robert Palmer (Addicted to love), Nona Hendryx, Madonna, Duran Duran, ABC, etc.\r\n\r\nEn 1985, il fonde et produit le groupe Power Station. Ce groupe, jouant sur un mélange de funk et de hard rock, comprenait John et Andy Taylor de Duran Duran, Robert Palmer et Tony Thompson (batteur de Chic). Le groupe compose deux morceaux notoires, Some like it hot et Get it on. Un second album de Power Station verra le jour en 1996.\r\n\r\nEn 1985 également, il produit A View to a Kill, titre phare de Duran Duran pour le film homonyme de James Bond.\r\n\r\nEn 1989, il fonde et produit le groupe rock Distance comprenant Robert Hart chanteur, Tony Thompson à la batterie, Eddy Martinez à la guitare, Jeff Bova aux claviers et lui-même à la basse. Le groupe sortira l\'album Under the one sky.\r\n\r\nSéparé en 1983, Chic se reforme autour de ses deux membres fondateurs en 1992 et sort un nouvel album (Chic-Ism). Le 18 avril 1996, à la suite d\'un concert live de Chic à Tokyo qui donnera lieu au CD Chic Live at the Budokan, Bernard Edwards succombe d\'une pneumonie dans sa chambre d\'hôtel, à 43 ans.', 'https://www.songhall.org/images/made/images/uploads/exhibits/Bernard_328_328_85_s_c1.jpg', 4),
(19, 'Collins', 'Bootsy', 'Funkadelic, Parliament, Houseguests, Malcom McLaren and the Bootzilla Orchestra, Fred Wesley and the J.B.\'s, World-Wide-Funkdrive, Praxis...', 'En 1968, avec son frère aîné, Phelps \'Catfish\' Collins (guitare), accompagné de Franky \'Kash\' Waddy (batterie) et Philippe Wynne (voix), Bootsy Collins forme le groupe The Pace-Setters1. En 1969, le groupe remplace au pied levé les Famous Flame, l\'orchestre de James Brown, et devinrent alors les J.B.\'s.\r\n\r\nUne rumeur affirme[réf. nécessaire] que James Brown congédia Bootsy Collins après que ce dernier eut des hallucinations dues au LSD sur scène. Bootsy expliquera plus tard dans le mensuel français Basse Mag qu\'il n\'avait plus jamais parlé à James Brown à partir d\'un épisode où le bassiste sous acide avait éclaté de rire alors que Brown le sermonnait après un concert plus ou moins réussi. Collins, sur les conseils du futur membre de The Parliaments, Mallia Franklin (en), déménagea à Détroit.\r\n\r\nFranklin présenta les frères Collins à George Clinton et ils rejoignirent le groupe Funkadelic. Bootsy joue sur la majeure partie de leurs premiers albums et participe à l\'écriture de certains morceaux. Son jeu était dur et rythmique et a eu une certaine influence sur l\'évolution du funk, du heavy metal, G-funk et de la soul. Ses lignes de basse sont alors de plus en plus passées à travers diverses pédales d\'effets, enveloppe filters, autowah, chorus... tout y passe et contribue au son particulièrement funky de Bootsy.\r\n\r\nC\'est durant cette période qu\'il prit le nom de \"Bootsy\", personnage en constante évolution, rock star étrange qui le devient de plus en plus, et flashy au fil du temps. Lorsque Bootsy, Catfish, Waddy, Joel Johnson (1953-2018), Mudbone Cooper, Robert Johnson and The Horny Horns forment le Bootsy\'s Rubber Band en 1976, le personnage de Bootsy devient Bootzilla, un dieu du rock flashy. Bootsy s\'éloigne alors de Parliament-Funkadelic, dans lequel il est remplacé par Cordell Mosson, pour poursuivre une carrière solo en tant que leader.\r\n\r\nBootsy\'s Rubber Band fait également partie du P Funk (communauté de groupes Funk des années 1970 - initialement Parliament et Funkadelic). Par la suite, la plupart des albums de Bootsy sortent sous le nom de Bootsy\'s Rubber Band.\r\n\r\nCollins collabora également avec Bill Laswell (notamment dans Praxis), Buckethead (également dans Praxis) et Aiyb Dieng pour l\'album Rhythmagick chez Masterplan Records, et fit quelques brillantes apparitions sur deux albums de Fatboy Slim. Il a aussi fait des apparitions avec le groupe Deee-Lite.\r\n\r\nCollins a été invité en guest star sur l\'album True Love de Toots and the Maytals, qui a gagné le Grammy du meilleur album reggae en 2004, et qui inclut de nombreux musiciens notables dont Willie Nelson, Eric Clapton, Jeff Beck, Trey Anastasio, Gwen Stefani / No Doubt, Ben Harper, Bonnie Raitt, Manu Chao, The Roots, Ryan Adams, Keith Richards, Toots Hibbert, Paul Douglas, Jackie Jackson, Ken Boothe, et The Skatalites.\r\n\r\nEn 2005, il chante dans l\'album Soul Circus du bassiste Victor Wooten. En 2011, il collabore avec Snoop Dogg sur la piste 1 de son album \"Doggumentary\", Toyz\'n Da Hood.\r\n\r\nSes albums suivants sortirent sous le nom de Bootsy Collins ou William \"Bootsy\" Collins.\r\n\r\nIl est \"narrateur\" dans l\'album An Evening with Silk Sonic (2021), avec Bruno Mars et Anderson Paak.', 'https://upload.wikimedia.org/wikipedia/commons/2/2a/Bootsy_Collins.jpg', 4),
(20, 'Graham', 'Larry', 'Sly and The Family Stone, Graham Central Station', 'Il joue dans le célèbre groupe de funk psychédélique Sly and the Family Stone de 1967 à 1972, qu\'il quitte pour créer sa propre formation, Graham Central Station, qui édite son premier album en 1974 et obtient un succès relatif durant la décennie.\r\n\r\nAu début des années 1980, Graham réalise quelques tubes pop en solo tels que One In A Million You, qui atteint la 9e place du classement Billboard. Après une longue période de vache maigre, il fait à nouveau parler de lui en 1998 en assurant les premières parties des concerts de Prince ainsi qu\'en publiant son dernier disque en date, GCS 2000, sur le label de ce dernier. Il accompagne le chanteur sur scène comme bassiste attitré en 1999, puis n\'effectue plus que quelques apparitions à ses côtés au cours des années 2000. L\'influence de la rencontre entre les deux musiciens est considérable puisqu\'en tant que Témoin de Jéhovah, Larry Graham contribue largement à la conversion religieuse de Prince.\r\n\r\nIl est également un pionnier de l\'utilisation des effets sur la basse : il combine souvent une fuzz à un phaser pour des solos apocalyptiques, qui ne sont pas sans rappeler le style du guitariste Jimi Hendrix.\r\n\r\nSa technique de slap est caractéristique : il fait la part belle à la puissance plutôt qu\'à la vitesse. Il frappe ses cordes de telle sorte que son pouce « traverse » la corde au lieu de s\'arrêter sur la touche. Certaines de ces lignes ne peuvent même comporter qu\'une seule note, mais sa manière de l\'accentuer porte la totalité du morceau, par exemple dans la chanson Everyday People de Sly and The Family Stone.\r\n\r\nIl utilise des basses de type Jazz Bass fabriquées au Japon par la marque Moon. Ses basses sont nommées Sunshine pour la quatre cordes et Moonshine pour la cinq cordes. Il dispose d\'un style vestimentaire singulier : blanc de la tête au pied, dont un chapeau ou une casquette de marin. Il pousse la fantaisie jusqu\'à équiper ses basses blanches de cordes dorées.\r\n\r\nIl est par ailleurs l\'oncle du rappeur Drake.', 'https://upload.wikimedia.org/wikipedia/commons/2/25/Larry_Graham.jpg', 4),
(21, 'White', 'Verdine', 'With Earth, Wind & Fire, Blacking Musician and Production Credits', 'Verdine Adams Jr est né à Chicago, Illinois, le 25 juillet 1951. Son père, Verdine Sr., était un médecin qui jouait également du saxophone. Il a grandi en écoutant les enregistrements de Miles Davis, John Coltrane et d\'autres musiciens de jazz. Il a également été influencé par Cleveland Eaton, les Beatles, The Motown Sound et ses deux frères batteurs, Fred et Maurice. Quand il avait 15 ans, il a vu une contrebasse dans sa classe d\'orchestre au lycée et a décidé qu\'il voulait jouer de la basse.\r\n\r\nIl a rapidement obtenu une basse électrique rouge et, suivant les conseils de son frère Maurice et de son père, a suivi des cours privés de Radi Velah de l\'Orchestre symphonique de Chicago, apprenant la méthode de contrebasse Billè, et les week-ends a appris la basse électrique avec le bassiste de Chess Records Session et le tromboniste Louis Satterfield, qui deviendra plus tard membre de la célèbre section de cuivres de Earth, Wind & Fire, The Phenix Horns. Verdine dit qu\'il a tout appris sur la guitare basse de Louis Satterfield, et certaines de ses premières influences de basse étaient James Jamerson, Paul McCartney et Gary Karr.\r\n\r\nPassant à une Fender Telecaster Bass nouvellement achetée au lieu de la contrebasse, Verdine a commencé à travailler sur la scène des clubs de Chicago avec des groupes locaux. Pendant ce temps, le frère Maurice, qui était un ancien batteur de session chez Chess Records et membre du trio du pianiste Ramsey Lewis, avait formé les Salty Peppers, marquant un succès local qui a attiré les oreilles de Capitol Records.\r\n\r\nAu début de 1970, Maurice s\'installe à Los Angeles, dans l\'espoir d\'enregistrer le groupe, qu\'il a renommé Earth, Wind & Fire et appelle Verdine pour lui demander s\'il souhaite le rejoindre, ce qu\'il fait, en arrivant à Los Angeles le 6 juin 1970.', 'https://upload.wikimedia.org/wikipedia/commons/3/3d/Verdine_White_2010.jpg', 4),
(22, 'Johnson', 'Louis', 'Brothers Johnson', 'Sa plus célèbre collaboration est celle avec Michael Jackson sur les albums Off the Wall, Thriller (notamment sur Don\'t Stop \'Til You Get Enough et Billie Jean) et Dangerous.\r\n\r\nEn compagnie de son frère George Johnson, il collabore par ailleurs avec Aretha Franklin, Quincy Jones, Billy Preston, David Ruffin, The Supremes, Bill Withers, Bobby Womack ou encore Stevie Wonder. Leur orchestre familial, The Brothers Johnson, publie sept albums studio, dont Light Up the Night en 1980, qui inclut le tube Stomp! Le groupe s\'est reformé ponctuellement en 2002 à l\'occasion d\'une tournée américaine.\r\n\r\nIl joue la plupart du temps sur une guitare basse électrique Music Man StingRay Bass.\r\n\r\nIl meurt le 22 mai 2015 à 60 ans d\'une hémorragie gastro-intestinale de l\'œsophage.', 'https://upload.wikimedia.org/wikipedia/commons/3/30/Louis_Johnson.jpg', 4),
(23, 'Gibb', 'Maurice', 'Bee Gees, The Fut, The Bloomfileds', 'Fils de Hugh Gibb, batteur amateur, et de Barbara Pass, Maurice naît sur l\'Île de Man 35 minutes après son jumeau Robin. Il est le quatrième enfant d\'une fratrie alors composée de Barry et d\'une grande sœur, Lesley. Son troisième frère, Andy, verra le jour en neuf ans plus tard. En 1955, la famille s\'établit dans le quartier de Chorlton-cum-Hardy à Manchester, en Angleterre. À cette époque, les trois frères aînés s\'entraînent déjà au chant, et créent le croupe des Rattlesnakes avec deux voisins. Ils se produisent dans des cinémas locaux et lors de fêtes de quartiers.\r\n\r\nLe groupe se dissout à la fin de l\'année 1958, lorsque les Gibb déménagent à Brisbane, en Australie, et emménagent dans l\'un des quartiers les plus défavorisés de la métropole, Cribb Island. Les trois frères sont indisciplinés et commettent quelques larcins. Barry déclare à ses frères qu\'ils doivent prendre une décision : soit ils deviennent des voyous, soit ils deviennent des musiciens. C\'est alors qu\'ils créent le groupe des Bee Gees.', 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Maurice_Gibb_2001.jpg', 4),
(24, 'Shakespeare', 'Robbie', 'Sly and Robbie', 'Robert Warren Dale Shakespeare[1] (27 septembre 1953 - 8 décembre 2021) était un bassiste et producteur de disques jamaïcain, mieux connu comme la moitié de la section rythmique reggae et du duo de production Sly and Robbie, avec le batteur Sly Dunbar. Considéré comme l\'un des bassistes de reggae les plus influents, Shakespeare était également connu pour son utilisation créative de l\'électronique et des unités d\'effets de production. Il était parfois surnommé \"Basspeare\".\r\n\r\nDans le cadre de Sly et Robbie, Shakespeare a travaillé avec divers artistes reggae tels que U-Roy, Peter Tosh, Bunny Wailer, Dennis Brown, Gregory Isaacs, Sugar Minott, Augustus Pablo, Yellowman et Black Uhuru. Son travail de production s\'est également étendu au-delà du genre reggae, couvrant divers artistes pop et rock tels que Mick Jagger, Bob Dylan, Jackson Browne, Cyndi Lauper, Joe Cocker, Yoko Ono, Serge Gainsbourg et Grace Jones. Avant son implication dans Sly and Robbie, il était membre des groupes de session The Revolutionaries et The Aggrovators.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Robbie_Shakespeare_TFF_03.JPG/1024px-Robbie_Shakespeare_TFF_03.JPG', 5),
(25, 'Barrett', 'Aston', 'The Wailers, The Upsetters', 'Aston Francis Barrett (né le 22 novembre 1946, à Kingston, Jamaïque), souvent appelé \"Familyman\" ou \"Fams\", est un bassiste jamaïcain. C\'est l\'un des frères Barrett, l\'autre étant le batteur Carlton \"Carly\" Barrett, avec qui il est principalement connu pour avoir accompagné The Wailers devenu Bob Marley & The Wailers après le départ de Peter Tosh et Bunny Wailer du groupe. Même si son frère et lui n\'ont jamais arrêté de jouer avec Bob Marley en studio comme en tournée jusqu\'à sa mort, ils ont aussi joué pour d\'innombrables mythes du reggae jamaïcain tel que Burning Spear, Max Romeo, Horace Andy, The Heptones... et bien sûr pour Peter Tosh et Bunny Wailer après leur départ des Wailers. Lui et son frère sont avec Sly & Robbie la plus mythique des sections rythmiques jamaïcaine.\r\n\r\nIl ne tient pas son surnom de \"Family Man\" par hasard : en effet, il est le père de 40 enfants (avec différentes compagnes...)\r\n\r\nEn 2006 il demande 60 millions de livres sterling de royalties impayés pour lui et son frère décédé, en tant que musicien, par lequel le son des Wailers est né. Il perd finalement le procès.\r\n\r\nRoger Steffens, grand spécialiste de Marley, a dit à propos de Aston Barrett : « Tant qu\'il y a Familyman à la basse, le groupe peut s\'appeler les Wailers ».', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Aston_Barrett.JPG/800px-Aston_Barrett.JPG', 5),
(26, 'Holt', 'Errol', '', 'Errol Holt (né vers 1950), connu également sous le nom Errol Carter, ainsi que par son surnom Flabba, est un bassiste jamaïcain.\r\n\r\nIl est membre fondateur du backing band The Roots Radics et à ce titre, bassiste fétiche du producteur Junjo Lawes. Il est également le bassiste historique du groupe Israel Vibration, notamment sur scène.\r\n\r\nFlabba a aussi coproduit l\'album Night Nurse de Gregory Isaacs en 1982, qui est un classique du genre.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Errol_%27Flabba%27_Holt_in_Antwerp_2018.jpg/260px-Errol_%27Flabba%27_Holt_in_Antwerp_2018.jpg', 5),
(27, 'Brevett', 'Lloyd', 'Lloyd and the Skatalites', 'Lloyd Brevett est un contrebassiste jamaïcain, né le 1er août 1931 à Kingston (Jamaïque), mort le 3 mai 20121. Il assurait, avec le batteur Lloyd Knibbs, la section rythmique du groupe de ska les Skatalites, actif depuis le début des années 1960. Rastafarien, il est, avec Knibbs, l\'un des derniers survivants des membres originaux du groupe. Fatigué, il se retire au milieu des années 2000.', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIALoAnwMBIgACEQEDEQH/', 5),
(28, 'Jackson', 'Jackie', 'Toots and the Maytals', 'Jackson est né en 1947 et a grandi dans le centre de Kingston. Son oncle était un musicien bien connu, Luther Williams, dont la sœur Mavis a donné des cours de piano à Jackson. Il a fréquenté une école de musique et a commencé à jouer de la basse après avoir vu Lloyd Brevett jouer avec les Skatalites. Il a également été influencé par les disques Motown, en particulier le jeu de basse de James Jamerson. Il a rejoint son premier groupe, Ty and the Titans, après le départ du bassiste existant. Après deux ans avec le groupe, il rejoint les Cavaliers, dirigés par Lester Sterling. Lorsque les Skatalites se sont séparés, Jackson a été approché par le saxophoniste Tommy McCook, qui formait un nouveau groupe, les Supersonics. Jackson a rejoint le groupe de McCook et est resté avec eux pendant cinq ans.\r\n\r\nLors de sa première session d\'enregistrement en 1967 avec le producteur Duke Reid, il a joué sur \"Girl I\'ve Got A Date\" d\'Alton Ellis, qui est considérée comme l\'une des chansons fondamentales du genre rocksteady. La ligne de basse de \"Girl I\'ve Got a Date\" aurait été reproduite dans d\'autres tubes internationaux \"The Liquidator\" des Harry J Allstars et \"I\'ll Take You There\" des Staple Singers.\r\n\r\nLe succès du disque signifie que Jackson est devenu très demandé pour des sessions au studio d\'enregistrement Reid\'s Treasure Isle, dirigé par McCook et jouant souvent aux côtés des guitaristes Lynn Taitt et Hux Brown, des claviéristes Gladstone Anderson et Winston Wright et du batteur Winston Grennan. Jackson était un pilier de la musique rocksteady et a commencé à travailler avec d\'autres producteurs, dont Leslie Kong, Joe Gibbs, Lloyd Daley et Sonia Pottinger, mais après une courte pause, il a également continué à travailler pour Reid, où le groupe était connu sous le nom de Supersonics. Chez Kong\'s Beverley\'s label, où le groupe est devenu connu sous le nom de Beverley\'s All-Stars, il a joué sur les tubes de Desmond Dekker, dont \"Israelites\", ainsi que sur des enregistrements de Nicky Thomas, Bob Marley, Ken Boothe et Toots and the Maytals, parmi de nombreux les autres. Après avoir rencontré et enregistré avec Toots Hibbert, et joué sur le tube \"Pressure Drop\", il a joué sur l\'enregistrement de 1971 de Paul Simon, \"Mother and Child Reunion\" et sur la bande originale de The Harder They Come de Jimmy Cliff. Il a joué sur les disques de Hibbert jusqu\'aux années 1980 et a également joué sur des disques d\'autres musiciens tels que Herbie Mann, Garland Jeffreys et Lee \"Scratch\" Perry.\r\n\r\nAlors que le reggae gagnait en succès à l\'international, Jackson est devenu membre du groupe de tournée de Toots Hibbert à partir du début des années 1970. Ils sont devenus le groupe d\'ouverture de Linda Ronstadt and the Eagles, et ont ensuite continué à tourner. Jackson est également devenu une influence clé sur les bassistes ultérieurs, notamment Aston \"Family Man\" Barrett et Robbie Shakespeare. En 2005, il a remporté un Grammy Award en tant que membre de Toots and the Maytals, pour le meilleur album de reggae.\r\n\r\nIl est marié à la chanteuse Karen Smith. En 2018, il a reçu un prix pour sa \"contribution exceptionnelle à l\'industrie du reggae\" par la Jamaica Reggae Industry Association (JARIA).', 'https://unitedreggae.com/userfiles/image/upload/201608/jackie-jackson-01.jpg', 5);
INSERT INTO `artiste` (`idArtiste`, `nomArtiste`, `prenomArtiste`, `groupeArtiste`, `descArtiste`, `imgArtiste`, `idStyle`) VALUES
(29, 'Sibbles', 'Leroy', 'Heptones', 'Il commence sa carrière en tant que chanteur principal du groupe de rocksteady The Heptones dans les années 1960, avec lesquels il a enregistré un certain nombre de classiques reggae comme Party Time, Fatty Fatty, Book Of Rules, Baby Be True et Heptones Gonna Fight.\r\n\r\nIl a joué également un rôle important dans la création de plusieurs titres ou rythmes estampillés Studio One, qui sont encore samplés et ré-enregistrés aujourd\'hui. Il a écrit et arrangé beaucoup des classiques des débuts du reggae, assurant dans le même temps la basse et la création des harmonies. Il quitte le trio des Heptones en 1977 pour continuer une carrière solo.\r\n\r\nLeroy Sibbles s\'installe à Toronto dans les années 1970. Il vivra 20 ans au Canada. Pendant ce temps, il a aidé l\'émergence du reggae au Canada, si bien qu\'il a été souvent qualifié de \"parrain du reggae au Canada\". Il a enregistré 6 albums là-bas: Now, Strictly Roots, On Top, The Best (Micron Music), Meanwhile (Attic) et Evidence (A&M). Il y a reçu un U-Know Award comme meilleur vocaliste homme en 1983, et un Juno comme meilleur album reggae en 1987.\r\n\r\nIl retourne en Jamaïque en 1994. Depuis son retour, il a connu d\'intensives tournées, notamment dans les Caraïbes, mais aussi au Japon, au Royaume-Uni, et aux États-Unis. Il a également sorti deux nouveaux albums, It\'s Not Over (1996), et Rock and Come On (1999), une compilation de vieux hits; ainsi qu\'une douzaine de nouveaux singles dont le plus récent I Cried.\r\n\r\nSes derniers travaux illustrent une fois encore sa capacité à créer une musique de qualité, intemporelle. Il a coécrit des titres avec des noms du reggae d\'aujourd\'hui comme Buju Banton et Beenie Man. Il reste un des rares artistes à pouvoir réunir toutes les tranches d\'âge, son public et son répertoire étant répartis sur quatre décennies.\r\n\r\nUn grand nombre des lignes de basse cultes de la musique jamaïcaine sont le fruit du travail d\'un homme, Leroy Sibbles. Cela fait de Sibbles un géant de la musique jamaïcaine, égal en stature à Bob Marley. Quels que soient les progrès qu\'ont apporté les Wailers dans les chants et la conscience du reggae, Sibbles en a fait au moins autant pour le développement de l\'instrument de musique le plus important du reggae. Il a été un pont entre les influences afro-jamaïcaine et afro-américaine. (Stephen Davis et Peter Simon pour Reggae International)', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Leroy_Sibbles.jpg/800px-Leroy_Sibbles.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `ban`
--

CREATE TABLE `ban` (
  `idBan` int(11) NOT NULL,
  `idUserBan` int(11) NOT NULL,
  `idModo` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ban`
--

INSERT INTO `ban` (`idBan`, `idUserBan`, `idModo`, `date`, `commentaire`) VALUES
(1, 1, 2, '2022-12-08 12:15:53', 'c 1 konar'),
(2, 1, 2, '2022-11-22 16:10:26', 'c 1 konard\r\n'),
(3, 1, 2, '2023-11-08 16:12:00', 'c 1 gro konar');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCat` int(11) NOT NULL,
  `nomCat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCat`, `nomCat`) VALUES
(1, 'Basse'),
(2, 'Ampli'),
(3, 'Disto'),
(4, 'Drive'),
(5, 'Fuzz'),
(6, 'Multi Effet'),
(7, 'Compresseur'),
(8, 'Limiteur'),
(9, 'Tuner'),
(10, 'Wah'),
(11, 'Phaser'),
(12, 'Flanger'),
(13, 'Octaver'),
(14, 'Preamp'),
(15, 'Looper'),
(16, 'Synthe'),
(17, 'Chorus'),
(18, 'Noise Gate'),
(19, 'Reverb'),
(20, 'Switch');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `IdCom` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idList` int(11) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`IdCom`, `idUser`, `idList`, `commentaire`, `date`) VALUES
(22, 2, 2, 'mes couilles au bord de l\'eau ça fait un radeau', '2022-10-26 15:14:48');

-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

CREATE TABLE `liens` (
  `idLien` int(11) NOT NULL,
  `morceau` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `tab` varchar(255) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liens`
--

INSERT INTO `liens` (`idLien`, `morceau`, `youtube`, `tab`, `idArtiste`) VALUES
(1, 'Come on Over', 'https://www.youtube.com/embed/nG1gRK5b_v0', 'https://www.songsterr.com/a/wsa/royal-blood-come-one-over-tab-s397048', 1),
(2, 'Little Monster', 'https://www.youtube.com/embed/ere2Mstl8ww', 'https://www.songsterr.com/a/wsa/royal-blood-little-monster-tab-s396454t2', 1),
(3, 'Out of the Black', 'https://www.youtube.com/embed/bSdtvfBQd6c', 'https://www.songsterr.com/a/wsa/royal-blood-out-of-the-black-tab-s387185', 1),
(4, 'Careless', 'https://www.youtube.com/embed/ge1TPrB-TUA', 'https://www.songsterr.com/a/wsa/royal-blood-careless-drums-and-tab-s455745', 1),
(5, 'How did you get so dark', 'https://www.youtube.com/embed/sbx95gBb5HM', 'https://www.songsterr.com/a/wsa/royal-blood-how-did-we-get-so-dark-tab-s435204', 1),
(6, 'Around the World', 'https://www.youtube.com/embed/a9eNQZbjpJk', 'https://www.songsterr.com/a/wsa/red-hot-chili-peppers-around-the-world-bass-tab-s14046', 2),
(7, 'Can\'t stop', 'https://www.youtube.com/embed/8DyziWtkfBw', 'https://www.songsterr.com/a/wsa/red-hot-chili-peppers-cant-stop-bass-tab-s12', 2),
(8, 'Snow (hey ho)', 'https://www.youtube.com/embed/yuFI5KSPAt4', 'https://www.songsterr.com/a/wsa/red-hot-chili-peppers-snow-hey-oh-bass-tab-s249', 2),
(9, 'Otherside', 'https://www.youtube.com/embed/8901V1M5lDk', 'https://www.songsterr.com/a/wsa/red-hot-chili-peppers-otherside-bass-tab-s23785', 2),
(10, 'Hysteria', 'https://www.youtube.com/embed/3dm_5qWWDV8', 'https://www.songsterr.com/a/wsa/muse-hysteria-bass-tab-s11430', 3),
(11, 'Plug in Baby', 'https://www.youtube.com/embed/dbB-mICjkQM', 'https://www.songsterr.com/a/wsa/muse-plug-in-baby-bass-tab-s1368', 3),
(12, 'Psycho', 'https://www.youtube.com/embed/UqLRqzTp6Rk', 'https://www.songsterr.com/a/wsa/muse-psycho-bass-tab-s397217', 3),
(13, 'Highway Star', 'https://www.youtube.com/embed/lC4gKA4ezcU', 'https://www.songsterr.com/a/wsa/deep-purple-highway-star-bass-tab-s490', 4),
(14, 'Take the Power Back', 'https://www.youtube.com/embed/qKSNABST4b0', 'https://www.songsterr.com/a/wsa/rage-against-the-machine-take-the-power-back-bass-tab-s10114', 6),
(15, 'Come On, Come Over', 'https://www.youtube.com/embed/idlyr6NrAn8', 'https://www.songsterr.com/a/wsa/jaco-pastorius-come-on-come-over-bass-tab-s29660', 5);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `idLike` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idList` int(11) NOT NULL,
  `isLike` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`idLike`, `idUser`, `idList`, `isLike`) VALUES
(157, 2, 1, 1),
(158, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lister`
--

CREATE TABLE `lister` (
  `idList` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idStyle` int(11) NOT NULL,
  `idArtiste1` int(11) NOT NULL,
  `idLien1` int(11) NOT NULL,
  `ordre1` int(14) NOT NULL DEFAULT 1,
  `idArtiste2` int(11) NOT NULL,
  `idLien2` int(11) NOT NULL,
  `ordre2` int(11) NOT NULL DEFAULT 2,
  `idArtiste3` int(11) NOT NULL,
  `idLien3` int(11) NOT NULL,
  `ordre3` int(11) NOT NULL DEFAULT 3,
  `idArtiste4` int(11) NOT NULL,
  `idLien4` int(11) NOT NULL,
  `ordre4` int(11) NOT NULL DEFAULT 4,
  `idArtiste5` int(11) NOT NULL,
  `idLien5` int(11) NOT NULL,
  `ordre5` int(11) NOT NULL DEFAULT 5,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lister`
--

INSERT INTO `lister` (`idList`, `idUser`, `idStyle`, `idArtiste1`, `idLien1`, `ordre1`, `idArtiste2`, `idLien2`, `ordre2`, `idArtiste3`, `idLien3`, `ordre3`, `idArtiste4`, `idLien4`, `ordre4`, `idArtiste5`, `idLien5`, `ordre5`, `likes`) VALUES
(1, 2, 2, 1, 1, 1, 2, 6, 2, 3, 10, 3, 4, 13, 4, 6, 14, 5, 21),
(2, 3, 2, 3, 11, 1, 1, 3, 2, 4, 13, 3, 6, 14, 4, 2, 8, 5, 27);

-- --------------------------------------------------------

--
-- Structure de la table `matos`
--

CREATE TABLE `matos` (
  `idMatos` int(11) NOT NULL,
  `nomMatos` varchar(255) NOT NULL,
  `mrqMatos` varchar(255) NOT NULL,
  `imgMatos` varchar(255) NOT NULL,
  `idCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matos`
--

INSERT INTO `matos` (`idMatos`, `nomMatos`, `mrqMatos`, `imgMatos`, `idCat`) VALUES
(3, 'Fender Precision Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/13616/fender-precision-bass-xl.jpg?v=1658470089', 1),
(4, 'Fender Jazz Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/10699/fender-jazz-bass-xl.jpg?v=1658469973', 1),
(5, 'Gibson Thunderbird', 'Gibson', 'https://images.equipboard.com/uploads/item/image/46578/gibson-thunderbird-bass-xl.jpg?v=1658471346', 1),
(6, 'Gibson EB-3 Bass', 'Gibson', 'https://images.equipboard.com/uploads/item/image/19713/gibson-eb-3-bass-xl.jpg?v=1658470349', 1),
(7, 'Rickenbacker 4001', 'Rickenbacker', 'https://images.equipboard.com/uploads/item/image/13387/rickenbacker-4001-xl.jpg?v=1658470078', 1),
(8, 'Rickenbacker 4003', 'Rickenbacker', 'https://images.equipboard.com/uploads/item/image/5323/rickenbacker-4003-xl.jpg?v=1658344618', 1),
(9, 'Fender Mustang Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/4547/fender-mustang-bass-xl.jpg?v=1657864816', 1),
(10, 'Ernie Ball Music Man Stringray Bass', 'Ernie Ball', 'https://images.equipboard.com/uploads/item/image/14657/ernie-ball-music-man-stingray-bass-guitar-xl.jpg?v=1658464633', 1),
(11, 'Höfner 500/1 Bass', 'Höfner', 'https://images.equipboard.com/uploads/item/image/13450/hofner-500-1-bass-xl.jpg?v=1658435519', 1),
(12, 'Ibanez Sound Gear', 'Ibanez', 'https://img.audiofanzine.com/images/u/product/normal/ibanez-gsr200-174777.png', 1),
(13, 'Malekko Heavy Industry B:ASSMASTER', 'Malekko Heavy Industry', 'https://images.equipboard.com/uploads/item/image/12578/malekko-b-assmaster-distortion-pedal-xl.jpg?v=1658815630', 13),
(14, 'Boss ODB-3 Bass OvverDrive', 'Boss', 'https://images.equipboard.com/uploads/item/image/7495/boss-odb-3-bass-overdrive-xl.jpg?v=1658815433', 4),
(17, 'Electro-Harmonix Big Muff Pi', 'Electro-Harmonix', 'https://images.equipboard.com/uploads/item/image/1343/electro-harmonix-big-muff-pi-xl.jpg?v=1658815237', 5),
(18, 'T-REX Enginnering Squeezer Tube-Driven Bass Compressor Pedal', 'T-REX Enginnering', 'https://images.equipboard.com/uploads/item/image/22633/t-rex-engineering-squeezer-tube-driven-bass-compressor-pedal-xl.jpg?v=1647132466', 7),
(21, 'Electro-Harmonix Bass Micro Syntho XO', 'Electro-Harmonix', 'https://images.equipboard.com/uploads/item/image/2074/electro-harmonix-bass-microsynth-effects-pedal-xl.jpg?v=1658815255', 16),
(22, 'TC Electronic Ditto X4 Looper', 'TC Electronic', 'https://images.equipboard.com/uploads/item/image/34431/tc-electronic-ditto-x4-looper-xl.jpg?v=1658816563', 15),
(23, 'Fender Rumble 200 v3', 'Fender', 'https://images.equipboard.com/uploads/item/image/20717/fender-rumble-v3-200w-1x15-bass-combo-amp-xl.jpg?v=1658815984', 2),
(24, 'Ampeg GVT52 212', 'Ampeg', 'https://images.equipboard.com/uploads/item/image/5321/ampeg-gvt52-212-xl.jpg?v=1633748744', 2),
(25, 'Fender Supersonic 22 Combo', 'Fender', 'https://images.equipboard.com/uploads/item/image/19518/fender-supersonic-22-combo-xl.jpg?v=1658727992', 2),
(26, 'Fender Bassbreaker 45W 2x12 Tube Guitar Combo Amp', 'Fender', 'https://images.equipboard.com/uploads/item/image/34325/fender-bassbreaker-45w-2x12-tube-guitar-combo-amp-xl.jpg?v=1656972895', 2),
(27, 'Electro-Harmonix POG2 Polyphonic Octave Generator', 'Electro-Harmonix', 'https://images.equipboard.com/uploads/item/image/9075/electro-harmonix-pog2-polyphonic-octave-generator-guitar-effects-pedal-xl.jpg?v=1658815498', 13),
(28, 'Tech 21 Red Ripper', 'Tech 21', 'https://images.equipboard.com/uploads/item/image/36021/tech-21-rip-red-ripper-bass-distortion-effect-pedal-xl.jpg?v=1658816623', 5),
(29, 'Tech 21 SansAmp Bass Driver DI', 'Tech 21', 'https://images.equipboard.com/uploads/item/image/14029/tech-21-sansamp-bass-driver-di-xl.jpg?v=1658815699', 14),
(30, 'Boss AW-2 Auto Wah', 'Boss', 'https://images.equipboard.com/uploads/item/image/22080/boss-aw-2-auto-wah-guitar-pedal-xl.jpg?v=1658816053', 10),
(31, 'Electro-Harmonix Bass Mono Synth', 'Electro-Harmonix', 'https://images.equipboard.com/uploads/item/image/73460/electro-harmonix-bass-mono-synth-xl.jpg?v=1658822582', 16),
(32, 'MXR M101 Phase 90', 'MXR', 'https://images.equipboard.com/uploads/item/image/4549/mxr-m101-phase-90-xl.jpg?v=1658815302', 11),
(33, 'Voodoo Lab HEX Audio Loop Switcher', 'Voodoo Lab', 'https://images.equipboard.com/uploads/item/image/42423/voodoo-lab-hex-audio-loop-switcher-xl.jpg?v=1658819017', 15),
(34, 'Boss TU-3 Chromatic Tuner', 'Boss', 'https://images.equipboard.com/uploads/item/image/792/boss-tu-3-chromatic-tuner-xl.jpg?v=1658824892', 9),
(35, 'TC Electronic RS410', 'TC Electronic', 'https://images.equipboard.com/uploads/item/image/21955/tc-electronic-rs410-xl.jpg?v=1651174249', 2),
(36, 'TC Electronic NDR-1 Nova Drive', 'TC Electronic', 'https://images.equipboard.com/uploads/item/image/6223/tc-electronic-ndr-1-nova-drive-xl.jpg?v=1658815388', 4),
(37, 'TC Electronic Dark Matter Distortion', 'TC Electronic', 'https://images.equipboard.com/uploads/item/image/15820/tc-electronic-dark-matter-distortion-xl.jpg?v=1658815760', 3),
(38, 'TC Electronic Spectra Drive', 'TC Electronic', 'https://images.equipboard.com/uploads/item/image/66113/tc-electronic-spectra-drive-xl.jpg?v=1658817541', 14),
(39, 'Status Chris Wolstenholme Signature Bass', 'Status', 'https://images.equipboard.com/uploads/item/image/13403/status-chris-wolstenholme-signature-bass-xl.jpg?v=1652653500', 1),
(40, 'Kitara Doubleneck Bass', 'Kitara', 'https://images.equipboard.com/uploads/item/image/44242/kitara-doubleneck-bass-xl.jpg?v=1626809271', 1),
(41, 'Ashdown BTA 400 400-Watt Valve Bass Amplifier Head', 'Ashdown', 'https://images.equipboard.com/uploads/item/image/14372/ashdown-bta-400-400-watt-valve-bass-amplifier-head-xl.jpg?v=1626958210', 2),
(42, 'Ampeg SVT-VR', 'Ampeg', 'https://images.equipboard.com/uploads/item/image/14135/ampeg-svt-vr-xl.jpg?v=1658815705', 2),
(43, 'ZVEX Woolly Mammoth', 'ZVEX', 'https://images.equipboard.com/uploads/item/image/1570/zvex-woolly-mammoth-fuzz-bass-effect-pedal-xl.jpg?v=1657297774', 5),
(44, 'Human Gear Animato', 'Human Gear', 'https://images.equipboard.com/uploads/item/image/15630/human-gear-animato-xl.jpg?v=1655731134', 3),
(45, 'Boss OS-2 OverDrive/Distortion', 'Boss', 'https://images.equipboard.com/uploads/item/image/2068/boss-os-2-overdrive-distortion-pedal-xl.jpg?v=1658815254', 3),
(46, 'pandaMidi Panda Audio Future Impact I.', 'pandaMidi', 'https://images.equipboard.com/uploads/item/image/46498/future-impact-i-bass-synthesizer-xl.jpg?v=1658816907', 6),
(47, 'DigiTech X-Series Bass Synth Wah', 'DigiTech', 'https://images.equipboard.com/uploads/item/image/19580/digitech-bass-synth-wah-envelope-filter-xl.jpg?v=1658815926', 16),
(48, 'Electro-Harmonix XO Octave Multiplexer', 'Electro-Harmonix', 'https://images.equipboard.com/uploads/item/image/4132/electro-harmonix-octave-multiplexer-pedal-xl.jpg?v=1658815287', 13),
(49, 'MXR M80 Bass D.I.+', 'MXR', 'https://images.equipboard.com/uploads/item/image/10169/mxr-m80-bass-d-i-xl.jpg?v=1658815544', 14),
(50, 'Fender Duff McKagan Precision Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/13820/fender-duff-mckagan-precision-bass-xl.jpg?v=1658812732', 1),
(51, 'Gallien-Krueger 800RB Bass Amp Head', 'Gallien-Krueger', 'https://images.equipboard.com/uploads/item/image/13545/gallien-krueger-800rb-bass-amp-head-xl.jpg?v=1658815675', 2),
(52, 'Fender Super Bassman Pro 300W Tube Bass Amp Head', 'Fender', 'https://images.equipboard.com/uploads/item/image/5328/fender-super-bassman-pro-300w-tube-bass-amp-head-xl.jpg?v=1658810808', 2),
(53, 'TC Electronic PolyTune 2 Mini', 'TC Electronic', 'https://images.equipboard.com/uploads/item/image/17357/tc-electronic-polytune-2-mini-xl.jpg?v=1658815818', 9),
(54, 'Fender Aerodyne Jazz Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/13475/fender-aerodyne-jazz-bass-xl.jpg?v=1658812637', 1),
(55, 'Gretsch G2220 Electromatic Junior Jet Bass II', 'Gretsch', 'https://images.equipboard.com/uploads/item/image/18636/gretsch-g2220-electromatic-junior-jet-bass-ii-xl.jpg?v=1658902306', 1),
(56, 'Fender Starcaster Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/17557/fender-starcaster-bass-xl.jpg?v=1658902251', 1),
(57, 'Fodera Richard Bona Signature Imperial', 'Fodera', 'https://images.equipboard.com/uploads/item/image/36854/fodera-richard-bona-signature-imperial-m.jpg?v=1657731497', 1),
(58, 'Markbass Mb Rb Kilimanjaro 5-String Natural', 'Markbass', 'https://images.equipboard.com/uploads/item/image/109013/markbass-mb-rb-kilimanjaro-5-string-natural-m.jpg?v=1657731498', 1),
(59, 'Markbass Little Mark Ninja', 'Markbass', 'https://images.equipboard.com/uploads/item/image/76516/markbass-little-mark-ninja-m.jpg?v=1631718189', 2),
(60, 'Boss LMB-3 Bass Limiter/Enhancer', 'Boss', 'https://images.equipboard.com/uploads/item/image/7492/boss-lmb-3-bass-limiter-enhancer-effects-pedal-m.jpg?v=1661321039', 8),
(61, 'Boss RC-30 Loop Station', 'Boss', 'https://images.equipboard.com/uploads/item/image/10857/boss-rc-30-loop-station-m.jpg?v=1661321181', 15),
(62, 'Roland V-Bass', 'Roland', 'https://images.equipboard.com/uploads/item/image/17668/roland-v-bass-m.jpg?v=1631526735', 6),
(63, 'Roland GR-20 Guitar Synthesizer', 'Roland', 'https://images.equipboard.com/uploads/item/image/20828/roland-gr-20-m.jpg?v=1661321616', 16),
(64, 'Ampeg B-15', 'Ampeg', 'https://images.equipboard.com/uploads/item/image/31740/ampeg-b-15-m.jpg?v=1660924206', 1),
(65, 'EBS Proline 410', 'EBS', 'https://images.equipboard.com/uploads/item/image/25359/ebs-proline-410-m.jpg?v=1661319696', 2),
(66, 'Markbass Big Bang', 'Markbass', 'https://images.equipboard.com/uploads/item/image/47709/markbass-big-bang-m.jpg?v=1661322628', 2),
(67, 'EBS TD660', 'EBS', 'https://images.equipboard.com/uploads/item/image/24809/ebs-td660-m.jpg?v=1646118555', 2),
(68, 'Hartke Prototype 810', 'Hartke', 'https://images.equipboard.com/uploads/item/image/30747/hartke-prototype-810-m.jpg?v=1581964949', 2),
(69, 'Markbass Standard 104HF', 'Markbass', 'https://images.equipboard.com/uploads/item/image/24392/markbass-standard-104hf-m.jpg?v=1661321790', 2),
(70, 'MXR M87 Bass Compressor', 'MXR', 'https://images.equipboard.com/uploads/item/image/16279/mxr-m87-bass-compressor-pedal-m.jpg?v=1661321396', 7),
(71, 'Zoom B3n', 'Zoom', 'https://images.equipboard.com/uploads/item/image/66622/zoom-b3n-m.jpg?v=1657471943', 6),
(72, 'Dunlop 535Q Cry Baby Multi-Wah', 'Dunlop', 'https://images.equipboard.com/uploads/item/image/4487/dunlop-535q-cry-baby-multi-wah-m.jpg?v=1661320901', 10),
(73, 'Fulltone OCD Obsessive Compulsive Drive', 'Fulltone', 'https://images.equipboard.com/uploads/item/image/842/fulltone-ocd-obsessive-compulsive-drive-overdrive-pedal-m.jpg?v=1661320826', 4),
(74, 'MXR M288 Bass Octave Deluxe', 'MXR', 'https://images.equipboard.com/uploads/item/image/5108/mxr-m288-bass-octave-deluxe-effects-pedal-m.jpg?v=1661320930', 13),
(75, 'Rodenberg GAS-MM Marcus Miller', 'Rodenberg', 'https://images.equipboard.com/uploads/item/image/32597/rodenberg-gas-mm-marcus-miller-m.jpg?v=1582084310', 6),
(76, 'Alembic Stanley Clarke Signature Bass', 'Alembic', 'https://images.equipboard.com/uploads/item/image/38265/alembic-stanley-clarke-signature-bass-m.jpg?v=1658791193', 1),
(77, 'Gibson Grabber G3 Bass', 'Gibson', 'https://images.equipboard.com/uploads/item/image/17800/gibson-grabber-g3-bass-m.jpg?v=1661111096', 1),
(78, 'Fender Marcus Miller Signature Jazz Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/10412/fender-marcus-miller-signature-jazz-bass-m.jpg?v=1661321163', 1),
(79, 'EBS MicroBass II', 'EBS', 'https://images.equipboard.com/uploads/item/image/18665/ebs-microbass-ii-m.jpg?v=1661321508', 14),
(80, 'Lexicon MPX 550', 'Lexicon', 'https://images.equipboard.com/uploads/item/image/38259/lexicon-mpx-550-m.jpg?v=1637296540', 6),
(81, 'EBS Stanley Clarke Signature Wah', 'EBS', 'https://images.equipboard.com/uploads/item/image/18663/ebs-stanley-clarke-signature-wah-m.jpg?v=1661321508', 10),
(82, 'Godin A5 Fretless Bass', 'Godin', 'https://images.equipboard.com/uploads/item/image/43634/godin-a5-fretless-bass-m.jpg?v=1661322481', 1),
(83, 'Fender Jaco Pastorius Fretless Jazz Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/26686/fender-jaco-pastorius-fretless-jazz-bass-3-color-sunburst-m.jpg?v=1661321892', 1),
(84, 'South Paw Esperanza Spalding Custom Fretless 5-String', 'South Paw', 'https://images.equipboard.com/uploads/item/image/68840/south-paw-esperanza-spalding-custom-fretless-5-string-m.jpg?v=1605553131', 1),
(85, 'Fender Jazz Bass Fretless', 'Fender', 'https://images.equipboard.com/uploads/item/image/24578/fender-jazz-bass-fretless-m.jpg?v=1655353004', 1),
(86, 'Ampeg PN-410HLF', 'Ampeg', 'https://images.equipboard.com/uploads/item/image/64995/ampeg-pn-410hlf-m.jpg?v=1562101309', 2),
(87, 'Rickenbacker Lemmy Kilmister \"Rickenbastard\" 4004LK Bass', 'Rickenbacker', 'https://images.equipboard.com/uploads/item/image/19264/rickenbacker-lemmy-kilmister-rickenbastard-4004lk-bass-m.jpg?v=1631399326', 1),
(88, 'Hagstrom 8-String Bass Guitar', 'Hagstrom', 'https://images.equipboard.com/uploads/item/image/8470/hagstrom-8-string-bass-guitar-m.jpg?v=1661321085', 1),
(89, 'Marshall Super Bass Head \"Murder One\"', 'Marshall', 'https://images.equipboard.com/uploads/item/image/44329/1976-marshall-super-bass-head-murder-one-m.jpg?v=1622667926', 2),
(90, 'Selmer Treble and Bass Amp Head', 'Selmer', 'https://images.equipboard.com/uploads/item/image/20800/selmer-treble-and-bass-amp-head-m.jpg?v=1640378544', 2),
(91, 'Marshall MF280L Lemmy Kilmister 4x12 Bass Cab', 'Marshall', 'https://images.equipboard.com/uploads/item/image/44331/marshall-mf280l-lemmy-kilmister-4x12-bass-cab-m.jpg?v=1647768216', 2),
(92, 'Marshall 1960B 4x12\'\' Cabinet', 'Marshall', 'https://images.equipboard.com/uploads/item/image/18101/marshall-1960b-4x12-cabinet-m.jpg?v=1661321479', 2),
(96, 'ESP Forest Fretless Bass', 'ESP', 'https://images.equipboard.com/uploads/item/image/25715/esp-forest-fretless-bass-m.jpg?v=1643673261', 1),
(97, 'Thor Bass Mjolnir 6 string fretless', 'Thor Bass', 'https://images.equipboard.com/uploads/item/image/23499/thor-bass-mjolnir-6-string-fretless-m.jpg?v=1643673261', 1),
(98, 'Ibanez BTB Series Bass Guitar', 'Ibanez', 'https://images.equipboard.com/uploads/item/image/25873/ibanez-btb-series-bass-guitar-m.jpg?v=1658464632', 1),
(107, 'EBS Fafner', 'EBS', 'https://images.equipboard.com/uploads/item/image/23500/ebs-fafner-ii-m.jpg?v=1627776184', 2),
(108, 'EBS Reidmar 750', 'EBS', 'https://images.equipboard.com/uploads/item/image/77498/ebs-reidmar-750-m.jpg?v=1661323605', 2),
(109, 'EBS ProLine 810', 'EBS', 'https://images.equipboard.com/uploads/item/image/27170/ebs-proline-810-m.jpg?v=1650846136', 2),
(110, 'EBS Neoline 810', 'EBS', 'https://images.equipboard.com/uploads/item/image/85867/ebs-neoline-810-m.jpg?v=1642116912', 2),
(111, 'EBS Billy Sheehan Signature Drive', 'EBS', 'https://images.equipboard.com/uploads/item/image/22697/ebs-billy-sheehan-signature-drive-m.jpg?v=1661319881', 4),
(112, 'DOD FX92 Bass Grunge', 'DOD', 'https://images.equipboard.com/uploads/item/image/22038/dod-fx92-bass-grunge-m.jpg?v=1661321680', 3),
(113, 'DOD FX82 Bass Compressor', 'DOD', 'https://images.equipboard.com/uploads/item/image/16563/dod-fx82-bass-comp-m.jpg?v=1661321402', 7),
(114, 'Darkglass Electronics Microtubes B7K Analog Bass PreAmp', 'Darkglass', 'https://images.equipboard.com/uploads/item/image/14359/darkglass-microtubes-b7k-analog-bass-preamp-pedal-m.jpg?v=1661321334', 14),
(115, 'EBS MultiComp True Dual Band Compressor Pedal', 'EBS', 'https://images.equipboard.com/uploads/item/image/13692/ebs-multicomp-true-dual-band-compressor-pedal-m.jpg?v=1659162213', 7),
(116, 'Darkglass Microtubes X7 Bass Preamp Pedal', 'Darkglass', 'https://images.equipboard.com/uploads/item/image/71595/darkglass-microtubes-x7-bass-preamp-pedal-m.jpg?v=1661323409', 14),
(117, 'DOD FX72 Bass Stereo Flanger', 'DOD', 'https://images.equipboard.com/uploads/item/image/24348/dod-fx72-bass-stereo-flanger-m.jpg?v=1661321789', 12),
(118, 'Planet Waves Tru-Strobe Pedal Tuner', 'Planet Waves', 'https://images.equipboard.com/uploads/item/image/7917/planet-waves-tru-strobe-pedal-tuner-m.jpg?v=1654165330', 9),
(119, 'Yamaha RBX6JM', 'Yamaha', 'https://images.equipboard.com/uploads/item/image/28660/yamaha-rbx6jm-m.jpg?v=1638509140', 1),
(120, 'Spector NS-2 Bass Guitar', 'Spector', 'https://images.equipboard.com/uploads/item/image/23030/spector-ns-2-bass-guitar-m.jpg?v=1660238398', 1),
(121, 'Ernie Ball Music Man Bongo 6-String Bass', 'Ernie Ball', 'https://images.equipboard.com/uploads/item/image/13081/ernie-ball-music-man-bongo-6-string-bass-m.jpg?v=1660195337', 1),
(122, 'Tung Wingbass II', 'Tung', 'https://images.equipboard.com/uploads/item/image/30707/tung-wingbass-ii-m.jpg?v=1611578412', 1),
(123, 'Hamer 8-String Bass', 'Hamer', 'https://images.equipboard.com/uploads/item/image/55350/hamer-8-string-bass-m.jpg?v=1641489720', 1),
(124, 'Ernie Ball Music Man Stingray 5', 'Ernie Ball', 'https://images.equipboard.com/uploads/item/image/10632/ernie-ball-music-man-stingray-5-m.jpg?v=1660238398', 1),
(125, 'Ernie Ball Music Man John Myung Artist Series Bongo 6 HH', 'Ernie Ball', 'https://images.equipboard.com/uploads/item/image/89792/john-myung-bongo-6-hh-m.jpg?v=1658380451', 1),
(134, 'Mesa Boogie M9 Carbine', 'Mesa Boogie', 'https://images.equipboard.com/uploads/item/image/36158/mesa-boogie-m9-carbine-m.jpg?v=1634510451', 2),
(135, 'Demeter VTHF-300M', 'Demeter', 'https://images.equipboard.com/uploads/item/image/23187/demeter-vthf-300m-m.jpg?v=1549548317', 2),
(136, 'Fractal Axe-Fx II Guitar Effects Processor', 'Fractal', 'https://images.equipboard.com/uploads/item/image/5000/fractal-axe-fx-ii-guitar-effects-processor-m.jpg?v=1661320923', 2),
(137, 'Mesa Boogie Big Block 750', 'Mesa Boogie', 'https://images.equipboard.com/uploads/item/image/29152/mesa-boogie-big-block-750-m.jpg?v=1602221119', 2),
(138, 'Ashdown ABM-600 Evo IV', 'Ashdown', 'https://images.equipboard.com/uploads/item/image/35578/ashdown-abm-600-evo-iv-m.jpg?v=1661322261', 2),
(139, 'Ashdown ABM-1200-EVO IV Head', 'Ashdown', 'https://images.equipboard.com/uploads/item/image/73556/ashdown-abm-1200-evo-iv-head-m.jpg?v=1661326836', 2),
(140, 'Demeter HBP-1 tube preamp/parametric EQ', 'Demeter', 'https://images.equipboard.com/uploads/item/image/31738/demeter-hbp-1-tube-preamp-parametric-eq-m.jpg?v=1602223287', 2),
(141, 'Ashdown ABM-410H-EVO IV Cabinet', 'Ashdown', 'https://images.equipboard.com/uploads/item/image/73557/ashdown-abm-410h-evo-iv-cabinet-m.jpg?v=1660457525', 2),
(142, 'Mesa Boogie Grid Slammer Overdrive', 'Mesa Boogie', 'https://images.equipboard.com/uploads/item/image/30263/mesa-boogie-grid-slammer-overdrive-m.jpg?v=1661322044', 4),
(143, 'MXR M-151 Doubleshot Distortion Pedal', 'MXR', 'https://images.equipboard.com/uploads/item/image/868/mxr-m-151-doubleshot-distortion-pedal-m.jpg?v=1661320830', 3),
(144, 'Yamaha BB1024X', 'Yamaha', 'https://images.equipboard.com/uploads/item/image/13966/yamaha-bb1024x-m.jpg?v=1644060409', 1),
(145, 'Lakland Geezer Butler Signature Bass', 'Lakland', 'https://images.equipboard.com/uploads/item/image/18743/lakland-geezer-butler-signature-bass-m.jpg?v=1657411245', 1),
(146, 'B.C. Rich Eagle Bass', 'B.C', 'https://images.equipboard.com/uploads/item/image/25869/b-c-rich-eagle-bass-m.jpg?v=1641489720', 1),
(147, 'Ampeg Dan Armstrong Lucite Bass', 'Ampeg', 'https://images.equipboard.com/uploads/item/image/25095/ampeg-dan-armstrong-lucite-bass-m.jpg?v=1660238398', 1),
(148, 'JayDee custom bass', 'JayDee', 'https://images.equipboard.com/uploads/item/image/34864/jaydee-custom-bass-m.jpg?v=1605549014', 1),
(149, 'Lakland USA Series 44-60', 'Lakland', 'https://images.equipboard.com/uploads/item/image/42242/lakland-usa-series-44-60-vintage-j-m.jpg?v=1656359251', 1),
(150, 'Ashdown ABM-RPM-GZR', 'Ashdown', 'https://images.equipboard.com/uploads/item/image/45603/ashdown-abm-rpm-gzr-m.jpg?v=1619999805', 2),
(151, 'Laney Supergroup 100 watt head', 'Laney', 'https://images.equipboard.com/uploads/item/image/25569/laney-supergroup-100-watt-head-m.jpg?v=1656902516', 2),
(152, 'Hartke Kilo Bass Amp', 'Hartke', 'https://images.equipboard.com/uploads/item/image/14315/hartke-kilo-bass-amp-m.jpg?v=1633020049', 2),
(153, 'Hartke AK 410', 'Hartke', 'https://images.equipboard.com/uploads/item/image/22694/hartke-ak-410-m.jpg?v=1623962727', 2),
(154, 'Hartke AK 115', 'Hartke', 'https://images.equipboard.com/uploads/item/image/22695/hartke-ak-115-m.jpg?v=1623962727', 2),
(155, 'MXR Custom Audio Electronics MC-401 Boost/Line Driver', 'MXR', 'https://images.equipboard.com/uploads/item/image/65621/mxr-custom-audio-electronics-mc-401-boost-line-driver-m.jpg?v=1653803528', 4),
(156, 'Dunlop GZR95 Geezer Butler Cry Baby Bass Wah', 'Dunlop', 'https://images.equipboard.com/uploads/item/image/56673/dunlop-gzr95-geezer-butler-cry-baby-bass-wah-m.jpg?v=1661322934', 10),
(157, 'B.C. Rich Mockingbird Bass', 'B.C.', 'https://images.equipboard.com/uploads/item/image/23652/b-c-rich-mockingbird-bass-m.jpg?v=1661189773', 1),
(158, 'Sterling by Music Man StingRay S.U.B. 4-String', 'Sterling', 'https://images.equipboard.com/uploads/item/image/32904/ernie-ball-musicman-sterling-sub-ray-4-m.jpg?v=1660864236', 1),
(159, 'Jackson Concert Bass', 'Jackson', 'https://images.equipboard.com/uploads/item/image/87876/jackson-concert-bass-m.jpg?v=1659995892', 1),
(160, 'Fender Steve Harris Signature Precision Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/23175/fender-steve-harris-signature-precision-bass-m.jpg?v=1661321741', 1),
(161, 'Peavey Zodiac DE Scorpio', 'Peavey', 'https://images.equipboard.com/uploads/item/image/23429/peavey-zodiac-de-scorpio-m.jpg?v=1621131970', 1),
(162, 'Jackson Concert Bass JS3VQ', 'Jackson', 'https://images.equipboard.com/uploads/item/image/75160/jackson-concert-bass-js3vq-m.jpg?v=1661323535', 1),
(163, 'Jackson David Ellefson Signature Kelly Bird Bass', 'Jackson', 'https://images.equipboard.com/uploads/item/image/8667/jackson-david-ellefson-signature-kelly-bird-bass-m.jpg?v=1621131970', 1),
(164, 'Jackson David Ellefson CB-X', 'Jackson', 'https://images.equipboard.com/uploads/item/image/8668/jackson-david-ellefson-cb-x-m.jpg?v=1644697021', 1),
(165, 'Jackson David Ellefson Signature Kelly Bird V Bass', 'Jackson', 'https://images.equipboard.com/uploads/item/image/20443/jackson-david-ellefson-signature-kelly-bird-v-bass-m.jpg?v=1626971357', 1),
(166, 'USA Signature David Ellefson Concert Bass CB V', 'USA', 'https://images.equipboard.com/uploads/item/image/51063/usa-signature-david-ellefson-concert-bass-cb-v-m.jpg?v=1660203533', 1),
(167, 'Takamine G-Series EGBS2S Cutaway Acoustic/Electric Bass', 'Takamine', 'https://images.equipboard.com/uploads/item/image/38102/takamine-g-series-egbs2s-cutaway-acoustic-electric-bass-m.jpg?v=1633775516', 1),
(168, 'Jackson David Ellefson CBXM-IV', 'Jackson', 'https://images.equipboard.com/uploads/item/image/78307/jackson-david-ellefson-cbxm-iv-m.jpg?v=1661323633', 1),
(169, 'Hartke LH1000 Bass Amplifier', 'Hartke', 'https://images.equipboard.com/uploads/item/image/19252/hartke-lh1000-bass-amplifier-m.jpg?v=1661321535', 2),
(170, 'Peavey MAX 700 Bass Head', 'Peavey', 'https://images.equipboard.com/uploads/item/image/23101/peavey-max-700-bass-head-m.jpg?v=1661321737', 2),
(171, 'Hartke HyDrive HX115 500 Watt Bass Cabinet - 1x15\"', 'Hartke', 'https://images.equipboard.com/uploads/item/image/17343/hartke-hydrive-hx115-500-watt-bass-cabinet-1x15-m.jpg?v=1635523841', 2),
(172, 'Peavey Pro 810 Bass Cabinet', 'Peavey', 'https://images.equipboard.com/uploads/item/image/23430/peavey-pro-810-bass-cabinet-m.jpg?v=1661321751', 2),
(173, 'Hartke HD500 Bass Combo', 'Hartke', 'https://images.equipboard.com/uploads/item/image/83850/hartke-hd500-bass-combo-m.jpg?v=1661323801', 2),
(174, 'Hartke HyDrive HX410 4x10\" 250-Watt Bass Cabinet', 'Hartke', 'https://images.equipboard.com/uploads/item/image/17344/hartke-hydrive-hx410-4x10-250-watt-bass-cabinet-m.jpg?v=1641253165', 2),
(175, 'Hartke HyDrive 8x10 Bass Cabinet', 'Hartke', 'https://images.equipboard.com/uploads/item/image/23373/hartke-hydrive-810-bass-cabinet-m.jpg?v=1638277661', 2),
(176, 'Hartke Hd25', 'Hartke', 'https://images.equipboard.com/uploads/item/image/53586/hartke-hd25-m.jpg?v=1661322836', 2),
(177, 'Hartke VXL Bass Attack Pedal', 'Hartke', 'https://images.equipboard.com/uploads/item/image/17245/hartke-vxl-bass-attack-pedal-m.jpg?v=1635724642', 14),
(178, 'Peterson StroboStomp2 Pedal Virtual Strobe Tuner', 'Peterson', 'https://images.equipboard.com/uploads/item/image/5141/peterson-strobostomp2-pedal-virtual-strobe-tuner-m.jpg?v=1658107181', 9),
(179, 'Ashdown Engineering Bass Drive Plus', 'Ashdown', 'https://images.equipboard.com/uploads/item/image/26468/ashdown-bass-drive-plus-m.jpg?v=1661321882', 4),
(180, 'KHDK Abyss Bass Overdrive', 'KHDK', 'https://images.equipboard.com/uploads/item/image/56129/khdk-abyss-bass-overdrive-m.jpg?v=1661322917', 4),
(181, 'Alembic Spoiler Bass', 'Alembic', 'https://images.equipboard.com/uploads/item/image/23465/alembic-spoiler-bass-m.jpg?v=1647765559', 1),
(182, 'Gibson EB-0 Bass', 'Gibson', 'https://images.equipboard.com/uploads/item/image/27873/gibson-eb-0-bass-m.jpg?v=1658032223', 1),
(183, 'Aria Pro II SB-1000', 'Aria', 'https://images.equipboard.com/uploads/item/image/30661/aria-pro-ii-sb-1000-m.jpg?v=1658309428', 1),
(184, 'Squier Affinity Series Precision Bass', 'Squier', 'https://images.equipboard.com/uploads/item/image/5958/squier-precision-bass-m.jpg?v=1660566892', 1),
(185, 'Peavey Mark IV Series 400 Bass Amp', 'Peavey', 'https://images.equipboard.com/uploads/item/image/23510/peavey-mark-iv-series-400-bass-amp-m.jpg?v=1653798279', 2),
(186, 'Randall RBA-500', 'Randall', 'https://images.equipboard.com/uploads/item/image/66438/randall-rba-500-m.jpg?v=1610388845', 2),
(187, 'Sunn Beta Bass Head', 'Sun Beta', 'https://images.equipboard.com/uploads/item/image/23197/sunn-beta-bass-head-m.jpg?v=1654271120', 2),
(188, 'Mesa Boogie 4x12 Cabinet', 'Mesa Boogie', 'https://images.equipboard.com/uploads/item/image/36254/mesa-boogie-4x12-cabinet-m.jpg?v=1661322285', 2),
(189, 'Road Electronics 440-218 Cabinet', 'Road Electronics', 'https://images.equipboard.com/uploads/item/image/66437/road-electronics-440-218-cabinet-m.jpg?v=1605803906', 2),
(190, 'Mesa Boogie Custom 1x15 Cabinet', 'Mesa Boogie', 'https://images.equipboard.com/uploads/item/image/80805/mesa-boogie-custom-1x15-cabinet-m.jpg?v=1572086337', 2),
(191, 'Morley Power Wah Boost PWB', 'Morley', 'https://images.equipboard.com/uploads/item/image/6499/morley-power-wah-boost-pwb-m.jpg?v=1658630103', 10),
(192, 'Morley PWF Power Wah Fuzz', 'Morley', 'https://images.equipboard.com/uploads/item/image/4284/morley-power-wah-fuzz-pedal-m.jpg?v=1661320892', 5),
(193, 'Boss CS-2 Compression Sustainer', 'Boss', 'https://images.equipboard.com/uploads/item/image/5440/boss-cs-2-compressor-guitar-effect-pedal-m.jpg?v=1661320950', 7),
(194, 'Sadowsky NYC Bass', 'Sadowsky', 'https://images.equipboard.com/uploads/item/image/16656/sadowsky-nyc-bass-m.jpg?v=1650597520', 1),
(201, 'Warwick Bootsy Collins Spacebass', 'Warwick', 'https://images.equipboard.com/uploads/item/image/48091/warwick-bootsy-collins-spacebass-m.jpg?v=1629034386', 1),
(202, 'Warwick Bootsy Collins Infinity Signature Bass', 'Warwick', 'https://images.equipboard.com/uploads/item/image/34390/warwick-bootsy-collins-infinity-signature-bass-m.jpg?v=1612819860', 1),
(203, 'Vox V271 Apollo IV', 'Vox', 'https://images.equipboard.com/uploads/item/image/97530/vox-v271-apollo-iv-m.jpg?v=1618853881', 1),
(204, 'Eastwood EEB-1', 'Eastwood', 'https://images.equipboard.com/uploads/item/image/35916/eastwood-eeb-1-m.jpg?v=1626968056', 1),
(205, 'Fender Jaguar Bass', 'Fender', 'https://images.equipboard.com/uploads/item/image/53447/fender-jaguar-bass-m.jpg?v=1660660142', 1),
(206, 'Ampeg AUB-1 Fretless Bass', 'Ampeg', 'https://images.equipboard.com/uploads/item/image/23995/ampeg-aub-1-fretless-bass-m.jpg?v=1612822380', 1),
(207, 'Warwick Larry Graham Signature Bass Guitar', 'Warwick', 'https://images.equipboard.com/uploads/item/image/24805/warwick-larry-graham-signature-bass-guitar-m.jpg?v=1463171043', 1),
(208, 'Vox Sidewinder Bass', 'Vox', 'https://images.equipboard.com/uploads/item/image/34388/vox-sidewinder-bass-m.jpg?v=1652302407', 1),
(209, 'Moon JJ-4 300B', 'Moon', 'https://images.equipboard.com/uploads/item/image/27874/moon-jj-4-300b-m.jpg?v=1657832095', 1),
(210, 'Acoustic 360 Bass Amp', 'Acoustic', 'https://images.equipboard.com/uploads/item/image/31752/acoustic-360-bass-amp-m.jpg?v=1652008891', 2),
(211, 'Roland AP-7 Jet Phaser', 'Roland', 'https://images.equipboard.com/uploads/item/image/48126/roland-ap-7-jet-phaser-m.jpg?v=1661409036', 11),
(212, 'Mu-Tron Octave Divider', 'Mu-Tron', 'https://images.equipboard.com/uploads/item/image/22652/mu-tron-octave-divider-m.jpg?v=1661408115', 13),
(213, 'Dunlop Cry Baby 105Q Bass Wah Pedal', 'Dunlop', 'https://images.equipboard.com/uploads/item/image/15718/dunlop-cry-baby-105q-bass-wah-pedal-m.jpg?v=1661407777', 10),
(214, 'Yamaha BB3000 White', 'Yamaha', 'https://images.equipboard.com/uploads/item/image/31717/yamaha-bb3000-white-m.jpg?v=1633485155', 1),
(215, 'Ibanez VWB1', 'Ibanez', 'https://images.equipboard.com/uploads/item/image/31719/ibanez-vwb1-m.jpg?v=1625215148', 1),
(216, 'Sadowsky Verdine White Signature Bass', 'Sadowsky', 'https://images.equipboard.com/uploads/item/image/63249/sadowsky-verdine-white-signature-bass-m.jpg?v=1628486122', 1),
(217, 'Warwick Streamer LX Amber Coloured', 'Warwick', 'https://images.equipboard.com/uploads/item/image/31721/warwick-streamer-lx-amber-coloured-m.jpg?v=1518336553', 1),
(218, 'SWR Mo\' Bass Preamp', 'SWR', 'https://images.equipboard.com/uploads/item/image/31736/swr-mo-bass-preamp-m.jpg?v=1641816247', 2),
(219, 'Ampeg B-15', 'Ampeg', 'https://images.equipboard.com/uploads/item/image/31740/ampeg-b-15-m.jpg?v=1660924206', 2),
(220, 'SWR Megoliath 8x10 Bass Cabinet', 'SWR', 'https://images.equipboard.com/uploads/item/image/23277/swr-megoliath-8x10-bass-cabinet-m.jpg?v=1612509844', 2),
(221, 'Guild B-302 Bass', 'Guild', 'https://images.equipboard.com/uploads/item/image/64747/guild-b-302-bass-m.jpg?v=1661409586', 1),
(222, 'PRS Grainger 4 string bass', 'PRS', 'https://images.equipboard.com/uploads/item/image/27317/prs-grainger-4-string-bass-m.jpg?v=1634736721', 1),
(223, 'Steinberger XT-2', 'Steinberger', 'https://images.equipboard.com/uploads/item/image/21564/steinberger-xt-2-m.jpg?v=1661408055', 1),
(224, 'Markbass SA450', 'Markbass', 'https://images.equipboard.com/uploads/item/image/44956/markbass-sa450-m.jpg?v=1602222229', 2),
(225, 'Markbass TA503', 'Markbass', 'https://images.equipboard.com/uploads/item/image/41450/markbass-ta503-m.jpg?v=1607119379', 2),
(226, 'ESP LTD B-1006', 'ESP', 'https://images.equipboard.com/uploads/item/image/27253/esp-ltd-b-1006-m.jpg?v=1639765640', 1),
(227, 'Hohner B-Bass IV', 'Hohner', 'https://images.equipboard.com/uploads/item/image/75695/hohner-b-bass-iv-natural-m.jpg?v=1642548236', 1),
(228, 'Acoustic B15 Bass Amp', 'Acoustic', 'https://images.equipboard.com/uploads/item/image/34961/acoustic-b15-bass-amp-m.jpg?v=1605557393', 2),
(229, 'Eden WT800', 'Eden', 'https://images.equipboard.com/uploads/item/image/25979/eden-wt800-m.jpg?v=1661408261', 2),
(230, 'Contrebass', 'Contrebass', 'https://i1.sndcdn.com/artworks-000022768739-knjsxb-t500x500.jpg', 1),
(231, 'Warwick RockBass Streamer 5', 'Warwick', 'https://images.static-thomann.de/pics/bdb/432695/13499306_800.jpg', 1),
(232, 'Ibanez SR505', 'Ibanez', 'https://images.equipboard.com/uploads/item/image/23142/ibanez-sr505-xl.jpg?v=1661406417', 1);

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

CREATE TABLE `report` (
  `idReport` int(11) NOT NULL,
  `idUserReported` int(11) NOT NULL,
  `idUserAlert` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `idSession` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`idSession`, `idUser`) VALUES
(63, 2),
(64, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2);

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

CREATE TABLE `style` (
  `idStyle` int(11) NOT NULL,
  `nomStyle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `style`
--

INSERT INTO `style` (`idStyle`, `nomStyle`) VALUES
(1, 'Jazz'),
(2, 'Rock'),
(3, 'Métal'),
(4, 'Funk / Disco'),
(5, 'Reggae');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(255) NOT NULL,
  `prenomUser` varchar(255) NOT NULL,
  `pseudoUser` varchar(255) NOT NULL,
  `mailUser` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roleAdmin` int(11) NOT NULL DEFAULT 0,
  `roleModo` int(11) NOT NULL DEFAULT 0,
  `ban` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `prenomUser`, `pseudoUser`, `mailUser`, `password`, `roleAdmin`, `roleModo`, `ban`) VALUES
(1, 'doe', 'john', 'admin', 'admin@admin.fr', '$argon2i$v=19$m=65536,t=4,p=1$ZkFHUzZEWndOZHBBVVVUcg$H43nvELYny0GagtCbK9v4Yl2RkntJAHy9HjaFyVvLTI', 0, 0, NULL),
(2, 'Crespel', 'Florentin', 'Funkins', 'test@test.fr', '$argon2i$v=19$m=65536,t=4,p=1$WFcwUnpOUURScllkZGJPdg$8TxFprNnNZ6UpshxMJzBN224RvZHUKw3Y0ZFkUboLRU', 1, 1, NULL),
(3, 'Decourcelle', 'Mathilde', 'Math', 'user@test.fr', '$argon2i$v=19$m=65536,t=4,p=1$VWZGMGFtSUU1aERzUlhsNw$OvoYPBUlMqTL+t6Hhzq2tAZpbGJq93pL2LzvhMcUC38', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utiliser`
--

CREATE TABLE `utiliser` (
  `idArtiste` int(11) NOT NULL,
  `idMatos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utiliser`
--

INSERT INTO `utiliser` (`idArtiste`, `idMatos`) VALUES
(1, 17),
(1, 21),
(1, 24),
(1, 28),
(1, 48),
(1, 52),
(1, 55),
(1, 56),
(2, 3),
(2, 4),
(2, 10),
(2, 11),
(2, 13),
(2, 14),
(2, 17),
(2, 18),
(2, 22),
(2, 23),
(2, 30),
(2, 31),
(2, 34),
(2, 51),
(3, 4),
(3, 7),
(3, 14),
(3, 17),
(3, 27),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 46),
(3, 47),
(3, 48),
(4, 3),
(4, 5),
(4, 7),
(4, 9),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(5, 4),
(5, 8),
(6, 3),
(6, 4),
(6, 7),
(6, 10),
(6, 27),
(6, 34),
(6, 42),
(7, 57),
(7, 58),
(7, 59),
(7, 60),
(7, 61),
(7, 62),
(7, 63),
(8, 4),
(8, 10),
(8, 27),
(8, 32),
(8, 70),
(8, 71),
(8, 72),
(8, 73),
(8, 74),
(8, 78),
(9, 42),
(9, 74),
(9, 76),
(9, 77),
(9, 78),
(9, 79),
(9, 80),
(9, 81),
(10, 42),
(10, 82),
(10, 83),
(10, 84),
(10, 85),
(10, 86),
(12, 5),
(12, 7),
(12, 8),
(12, 87),
(12, 88),
(13, 8),
(13, 65),
(13, 74),
(13, 79),
(13, 96),
(13, 97),
(13, 98),
(13, 112),
(13, 113),
(13, 114),
(13, 115),
(13, 116),
(13, 117),
(13, 118),
(14, 4),
(14, 10),
(14, 42),
(14, 70),
(14, 119),
(14, 120),
(14, 121),
(14, 122),
(14, 123),
(14, 124),
(14, 125),
(14, 134),
(14, 135),
(14, 136),
(14, 137),
(14, 138),
(14, 139),
(14, 140),
(14, 141),
(14, 142),
(14, 143),
(15, 3),
(15, 7),
(15, 72),
(15, 141),
(15, 144),
(15, 145),
(15, 146),
(15, 147),
(15, 148),
(15, 149),
(15, 150),
(15, 151),
(15, 152),
(15, 153),
(15, 154),
(15, 155),
(15, 156),
(16, 3),
(16, 49),
(16, 51),
(16, 53),
(16, 71),
(16, 120),
(16, 146),
(16, 152),
(16, 157),
(16, 158),
(16, 159),
(16, 160),
(16, 161),
(16, 162),
(16, 163),
(16, 164),
(16, 165),
(16, 166),
(16, 167),
(16, 168),
(16, 169),
(16, 170),
(16, 171),
(16, 172),
(16, 173),
(16, 174),
(16, 175),
(16, 176),
(16, 177),
(16, 178),
(16, 179),
(16, 180),
(17, 3),
(17, 7),
(17, 17),
(17, 181),
(17, 182),
(17, 183),
(17, 184),
(17, 185),
(17, 186),
(17, 187),
(17, 188),
(17, 189),
(17, 190),
(17, 191),
(17, 192),
(17, 193),
(18, 3),
(18, 10),
(18, 120),
(18, 146),
(18, 194),
(19, 3),
(19, 4),
(19, 17),
(19, 21),
(19, 42),
(19, 43),
(19, 46),
(19, 47),
(19, 114),
(19, 192),
(19, 201),
(19, 202),
(19, 203),
(19, 204),
(19, 205),
(19, 206),
(20, 207),
(20, 208),
(20, 209),
(20, 210),
(20, 211),
(20, 212),
(20, 213),
(21, 54),
(21, 64),
(21, 140),
(21, 214),
(21, 215),
(21, 216),
(21, 217),
(21, 218),
(21, 220),
(22, 10),
(23, 3),
(23, 8),
(23, 221),
(24, 4),
(24, 11),
(24, 69),
(24, 222),
(24, 223),
(24, 224),
(24, 225),
(25, 4),
(25, 210),
(25, 226),
(25, 227),
(25, 228),
(25, 229),
(26, 4),
(26, 11),
(26, 223),
(26, 230),
(28, 4),
(28, 223),
(29, 11),
(29, 223),
(29, 231),
(29, 232);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`idArtiste`),
  ADD KEY `artiste_style_FK` (`idStyle`);

--
-- Index pour la table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`idBan`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCat`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`IdCom`),
  ADD KEY `comment_idUser0_FK` (`idUser`),
  ADD KEY `comment_idList0_FK` (`idList`);

--
-- Index pour la table `liens`
--
ALTER TABLE `liens`
  ADD PRIMARY KEY (`idLien`),
  ADD KEY `liens_artiste_FK` (`idArtiste`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `likes_idUser0_FK` (`idUser`),
  ADD KEY `likes_idList0_FK` (`idList`);

--
-- Index pour la table `lister`
--
ALTER TABLE `lister`
  ADD PRIMARY KEY (`idList`,`idUser`,`idStyle`,`idArtiste1`,`idLien1`,`idArtiste2`,`idLien2`,`idArtiste3`,`idLien3`,`idArtiste4`,`idLien4`,`idArtiste5`,`idLien5`) USING BTREE,
  ADD KEY `lister_style0_FK` (`idStyle`),
  ADD KEY `lister_artiste1_FK` (`idArtiste1`),
  ADD KEY `lister_liens2_FK` (`idLien1`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idList` (`idList`),
  ADD KEY `idArtiste2` (`idArtiste2`,`idLien2`,`idArtiste3`,`idLien3`,`idArtiste4`,`idLien4`,`idArtiste5`,`idLien5`);

--
-- Index pour la table `matos`
--
ALTER TABLE `matos`
  ADD PRIMARY KEY (`idMatos`),
  ADD KEY `matos_categorie_FK` (`idCat`);

--
-- Index pour la table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`idReport`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idSession`),
  ADD KEY `session_user0_FK` (`idUser`) USING BTREE;

--
-- Index pour la table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`idStyle`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `utiliser`
--
ALTER TABLE `utiliser`
  ADD PRIMARY KEY (`idArtiste`,`idMatos`),
  ADD KEY `utiliser_matos0_FK` (`idMatos`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `idArtiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `ban`
--
ALTER TABLE `ban`
  MODIFY `idBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `IdCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `liens`
--
ALTER TABLE `liens`
  MODIFY `idLien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT pour la table `lister`
--
ALTER TABLE `lister`
  MODIFY `idList` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `matos`
--
ALTER TABLE `matos`
  MODIFY `idMatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT pour la table `report`
--
ALTER TABLE `report`
  MODIFY `idReport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `style`
--
ALTER TABLE `style`
  MODIFY `idStyle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD CONSTRAINT `artiste_style_FK` FOREIGN KEY (`idStyle`) REFERENCES `style` (`idStyle`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_idList0_FK` FOREIGN KEY (`idList`) REFERENCES `lister` (`idList`),
  ADD CONSTRAINT `comment_idUser0_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `liens`
--
ALTER TABLE `liens`
  ADD CONSTRAINT `liens_artiste_FK` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_idList0_FK` FOREIGN KEY (`idList`) REFERENCES `lister` (`idList`),
  ADD CONSTRAINT `likes_idUser0_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `lister`
--
ALTER TABLE `lister`
  ADD CONSTRAINT `lister_artiste1_FK` FOREIGN KEY (`idArtiste1`) REFERENCES `artiste` (`idArtiste`),
  ADD CONSTRAINT `lister_liens2_FK` FOREIGN KEY (`idLien1`) REFERENCES `liens` (`idLien`),
  ADD CONSTRAINT `lister_style0_FK` FOREIGN KEY (`idStyle`) REFERENCES `style` (`idStyle`),
  ADD CONSTRAINT `lister_user_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `matos`
--
ALTER TABLE `matos`
  ADD CONSTRAINT `matos_categorie_FK` FOREIGN KEY (`idCat`) REFERENCES `categorie` (`idCat`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_user0_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `utiliser`
--
ALTER TABLE `utiliser`
  ADD CONSTRAINT `utiliser_artiste_FK` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`),
  ADD CONSTRAINT `utiliser_matos0_FK` FOREIGN KEY (`idMatos`) REFERENCES `matos` (`idMatos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
