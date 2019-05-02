-- phpMyAdmin SQL Dump
-- version home.pl
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 02 Maj 2019, 13:33
-- Wersja serwera: 5.7.24-27-log
-- Wersja PHP: 5.6.34

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `30189788_uzytkownicy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE IF NOT EXISTS `pytania` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pytanie` text COLLATE utf8_polish_ci NOT NULL,
  `odpA` text COLLATE utf8_polish_ci NOT NULL,
  `odpB` text COLLATE utf8_polish_ci NOT NULL,
  `odpC` text COLLATE utf8_polish_ci NOT NULL,
  `poprawna` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`id`, `pytanie`, `odpA`, `odpB`, `odpC`, `poprawna`) VALUES
(1, 'Pierwszy spadochron w kształcie piramidy narysował:', 'Michał Anioł', 'Leonardo da Vinci', 'Leon Battista Alberti', '1 B'),
(2, 'Udokumentowane przekazy o udanych próbach lotów na urządzeniach działających na zasadzie lotni pochodzą z:\r\n\r\n', 'początku XX wieku', 'XVIII wieku', 'XIX wieku', '2 C'),
(3, 'Jan Wnęk wykonał udane loty:\r\n\r\n', 'ze szczytów górskich\r\n', 'z wieży kościelnej i ze zbocza pagórka\r\n', 'z wysokich pagórków', '3 B'),
(4, 'Otto Lilenthal wykonał na skonstruowanym przez siebie „szybowcu”:\r\n\r\n', 'ponad dwa tysiące kilkusetmetrowych lotów\r\n', 'ponad tysiąc kilkusetmetrowych lotów\r\n', 'około kilkuset lotów', '4 A'),
(5, 'Kto nazwał latający sprzęt lotnią?\r\n\r\n', 'Otto Lilenthal\r\n', 'Jan Wnęk\r\n', 'Czesław Tański', '5 C'),
(6, 'Podczas I wojny światowej spadochrony udoskonalono w takim stopniu, że zaczęto je wykorzystywać jako sprzęt:\r\n\r\n', 'zwiadowczy\r\n', 'ratowniczy\r\n', 'turystyczny', '6 B'),
(7, 'Ewolucja spadochronu nastąpiła w:\r\n\r\n', 'latach 50\r\n', 'latach 60\r\n', 'latach 70', '7 B'),
(8, 'Pierwsze mistrzostwa Europy w paralotniarstwie odbyły się:\r\n\r\n', 'we Francji\r\n\r\n', 'we Włoszech\r\n', 'w Austrii', '8 A'),
(9, 'W Polsce pierwsze paralotnie pojawiły się w latach:\r\n', '1987-1988\r\n', '1988-1989\r\n', '1986-1987', '9 A'),
(10, 'W Polsce przyjęła się nazwa:\r\n\r\n', 'paragliding\r\n', 'paralotniarstwo\r\n', 'spadochroniarstwo szybujące', '10 B');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slowa`
--

CREATE TABLE IF NOT EXISTS `slowa` (
  `idSlowa` int(11) NOT NULL AUTO_INCREMENT,
  `slowa` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`idSlowa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=43 ;

--
-- Zrzut danych tabeli `slowa`
--

INSERT INTO `slowa` (`idSlowa`, `slowa`) VALUES
(1, 'kot'),
(2, 'zupa'),
(3, 'znak'),
(4, 'młot'),
(5, 'widok'),
(6, 'kasztan'),
(7, 'chomik'),
(8, 'hasło'),
(9, 'widok'),
(10, 'ufo'),
(11, 'bok'),
(12, 'lekarz'),
(13, 'pomidor'),
(14, 'złość'),
(15, 'nowy'),
(16, 'miasto'),
(17, 'huragan'),
(18, 'rózga'),
(19, 'wiadro'),
(20, 'widły'),
(21, 'miska'),
(22, 'kubek'),
(23, 'liść'),
(24, 'gmina'),
(25, 'kołdra'),
(26, 'osioł'),
(27, 'kurs'),
(28, 'masło'),
(29, 'mydło'),
(30, 'obiad'),
(31, 'stół'),
(32, 'gruz'),
(33, 'arbuz'),
(34, 'lufa'),
(35, 'potok'),
(36, 'zbroja'),
(37, 'jajko'),
(38, 'drzewo'),
(39, 'kapusta'),
(40, 'rezerwa'),
(41, 'małpa'),
(42, 'poseł');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teksty`
--

CREATE TABLE IF NOT EXISTS `teksty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tekst` text COLLATE utf8_polish_ci NOT NULL,
  `ileSlow` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `teksty`
--

INSERT INTO `teksty` (`id`, `tekst`, `ileSlow`) VALUES
(1, 'PARALOTNIARSTWO POCZĄTKI  I WSPÓŁCZESNOŚĆ\r\nParalotniarstwo wywodzi się bezpośrednio z lotniarstwa i spadochroniarstwa. Od początku też korzystało z ich doświadczeń. Pierwowzory lotni i spadochronu są najprostszymi aparatami latającymi. W przyrodzie spotyka się nasiona posiadające zdolność przenoszenia się z wiatrem - mogłyby one posłużyć jako pierwowzór spadochronu, szybowca czy wirującego skrzydła śmigłowca. Zdolność latania najlepiej wykształciły u siebie ptaki. Obserwujemy u nich ogromne zróżnicowanie technik startu, lądowania i samego mechanizmu lotu. Największe ptaki opanowały znakomicie technikę lotu, wykorzystując do długotrwałego unoszenia się w powietrzu prądy zboczowe i termiczne. Człowiek, zafascynowany lotem ptaków, obserwował je i próbował naśladować. Do naszych czasów przetrwało wiele podań i historycznych zapisów - mniej lub bardziej wiarygodnych. Symboliczną postacią stał się Ikar. chociaż to lot jego ojca, Dedala, zakończył się pomyślnie.\r\nPierwszy spadochron w kształcie piramidy narysował Leonardo da Vinci, lecz prawdopodobnie nie próbował jego skuteczności. W następnych stuleciach podjęto wiele prób wznoszenia się w powietrze za pomocą rozmaitych wynalazków. Niektórzy próbowali skoków z wysokości z nadzieją, że jeśli nawet nie wzbiją się wyżej, to chociaż bezpiecznie wylądują.\r\nWiarygodne, udokumentowane przekazy o udanych próbach lotów na urządzeniach działających na zasadzie lotni pochodzą z XIX wieku. Jednym z pionierów był Polak Jan Wnęk, który na konstrukcjach wzorowanych na ptasich skrzydłach kilkakrotnie wykonał udane loty z wieży kościelnej i ze zbocza pagórka. Niestety, w 1869 roku jeden z lotów zakończył się śmiertelnym upadkiem.\r\nW latach 1891-1896 niemiecki inżynier Otto Lilienthal wykonał ponad dwa tysiące kilkusetmetrowych lotów na skonstruowanym przez siebie „szybowcu". Wykorzystywał prądy zboczowe, dzięki którym uzyskiwał przewyższenia nad miejscem startu. Zginął tragicznie, wypróbowując nowy, dwupłatowy model „szybowca". Inny Polak - Czesław Tański - w tym samym okresie pracował nad swym latającym aparatem, który nazwał „lotnią". Rozległe zainteresowania Tańskiego, jak i miejsce jego zamieszkania (teren nizinny), nie pozwoliły mu jednak dopracować swego wynalazku.\r\nRównocześnie pracowano nad konstrukcjami pozwalającymi wykonywać loty ślizgowe i nad szytymi z materiału spadochronami. Podczas I wojny światowej spadochrony udoskonalono w takim stopniu, że zaczęto je wykorzystywać jako sprzęt ratowniczy. Pod koniec wojny zbudowano wznoszący się spadochron, który mógł unosić obserwatorów z pokładów łodzi podwodnych. Skuteczne, lecz o kiepskich właściwościach okrągłe spadochrony zostały udoskonalone, zmieniły kształt, uzyskując również pewne zdolności manewrowe.\r\nPracownik NASA Francis Rogallo eksperymentował z urządzeniami wykonanymi z tkaniny. Warto zaznaczyć, że Rogallo był potomkiem polskich emigrantów o nazwisku Rogala. Jego składane płaty nośne stosowano do powietrznych dostaw towaru, a sterowane spadochrony użyto w statkach kosmicznych serii Gemini. Płaty pana Rogallo były także wykorzystywane przez pionierów awiacji do odrywania się od ziemi za pomocą holu lub siły własnych nóg. Budowali oni swe lotnie z bambusa, polietylenu i taśmy samoprzylepnej, a pilot był podwieszony pod skrzydłem - stąd też angielska nazwa lotniarstwa - „hang - gliding". Dla bezpieczeństwa na początku nie wznoszono się powyżej wysokości bezpiecznego upadku.\r\nWkrótce, w latach 60. konstrukcje tak udoskonalono, że umożliwiały wyższe, bezpieczne loty. W niektórych krajach bardzo popularne stały się loty na holu. Coraz częściej spadochrony szybujące, startujące z powierzchni ziemi przewyższały możliwościami tradycyjne konstrukcje. Ewolucja typowego spadochronu skrzydłowego doprowadziła do znacznej poprawy osiągów pierwszych paralotni. Bardzo szybko zaczęły one diametralnie różnić się od swych spadochronowych pierwowzorów. Udoskonalenia polegały głównie na zastosowaniu cieńszych profili aerodynamicznych, zaokrągleniu krawędzi natarcia, zwiększeniu liczby komór, zmniejszeniu powierzchni wlotów napełniających i zastosowaniu specjalnych materiałów. Zwiększyło się też wydłużenie skrzydeł, i co za tym idzie również ich doskonałość.\r\nJuż we wczesnych latach 80. paralotnie regularnie startowały ze szczytów Alp, zdobywając zadziwiającą popularność. W ciągu kilku lat sport ten ugruntował swoją pozycję. Pierwsze mistrzostwa Europy rozegrano w 1988 roku we Francji, a paralotniowe mistrzostwa świata odbyły się w miejscowości Kóssen w Austrii w 1989 roku. Również w tym roku oficjalnie nazwano ten sport „paraglidingiem". Ustalono procedury szkoleniowe oraz zdobyto obszerną wiedzę na temat zachowania i stabilności paralotni. Zaczęto wykorzystywać prądy zboczowe i termiczne do nabierania wysokości i wykonywano coraz dłuższe przeloty.\r\nWraz z polepszeniem osiągów paralotni rosły ich ceny i malało bezpieczeństwo latania, szczególnie w wyczynowych skrzydłach, których konstruktorzy kładli nacisk na jak najlepsze parametry. Poprawa osiągów kosztem bezpieczeństwa była niepożądanym efektem gwałtownego rozwoju sprzętu. Wprowadzono normy testowe po to, by każdy nowy model paralotni został sprawdzony i sklasyfikowany według stopni bezpieczeństwa. Wszystko dlatego, by nie stwarzał zagrożenia dla jego posiadacza.\r\nW Polsce pierwsze paralotnie pojawiły się w latach 1987-1988. Nazywano je paraplanami, spadochronami szybującymi lub zboczowymi.\r\nW końcu przyjął się termin „paralotniarstwo". Potocznie paralotnie nazywamy również „glajtami" lub po prostu skrzydłami.\r\n', 713);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `haslo` varchar(256) CHARACTER SET utf8 NOT NULL,
  `tempo` int(11) NOT NULL,
  `zrozumienie` float NOT NULL,
  `ktoryTekst` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=73 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `email`, `haslo`, `tempo`, `zrozumienie`, `ktoryTekst`) VALUES
(1, 'tomaszyk', 'tomaszmlastek@gmail.com', 'a47773683b9aed7704195e9ec654476f', 3290, 9, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
