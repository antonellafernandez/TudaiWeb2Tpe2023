-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 10:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id_author` int(100) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id_author`, `name`) VALUES
(1, 'Bram Stoker'),
(2, 'Edgar Allan Poe'),
(3, 'H.P Lovecraft'),
(4, 'Mary Shelley'),
(5, 'Stephen King'),
(6, 'Clive Barker'),
(7, 'Shirley Jackson'),
(8, 'Mariana Enríquez'),
(9, 'John Ajvide Lindqvist'),
(10, 'Joe Hill');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_book` int(100) NOT NULL,
  `title` varchar(45) NOT NULL,
  `publication_date` int(4) NOT NULL,
  `id_author` int(100) NOT NULL,
  `synopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_book`, `title`, `publication_date`, `id_author`, `synopsis`) VALUES
(21, 'Dracula', 1897, 1, 'Jonathan Harker viaja a Transilvania para cerrar un negocio inmobiliario  con un misterioso conde que acaba de comprar varias propiedades en  Londres. Después de un viaje plagado de ominosas señales, Harker es  recogido en el paso de Borgo por un siniestro carruaje que lo llevará,  acunado por el canto de los lobos, a un castillo en ruinas. Tal es el  inquietante principio de una novela magistral que alumbró uno de los mitos más populares y poderosos de todos los tiempos: Drácula. La presente edición incluye una detallada cronología y el prefacio del  reputado catedrático y crítico Christopher Frayling, donde se analiza la  figura de Stoker y las circunstancias que propiciaron la creación de Drácula. Asimismo, la perspicaz introducción  a cargo del  especialista Maurice Hindle reflexiona sobre los aspectos más polémicos  en torno al origen del prototipo vampírico. La cuidada traducción es de Mario Montalbán.'),
(22, 'The Jewel of Seven Stars', 1903, 1, 'Un egiptólogo que intenta resucitar a la momia de Tera, una antigua reina egipcia, encuentra una gema y una fuerza desconocida lo deja sin sentido. En medio de escenas sangrientas y espeluznantes, su hija es poseída por el alma de Tera y su destino depende de devolverle vida al cuerpo momificado de Tera.'),
(23, 'The Raven', 1845, 2, '\"El cuervo\" es un poema narrativo del escritor estadounidense Edgar Allan Poe. El poema a menudo se destaca por su musicalidad, lenguaje estilizado y atmósfera sobrenatural. Habla de un amante angustiado que recibe la misteriosa visita de un cuervo parlante.'),
(24, 'The Black Cat', 1843, 2, '\"El gato negro\" es un cuento del escritor estadounidense Edgar Allan Poe. En la historia, un narrador anónimo siente un gran afecto por las mascotas hasta que perversamente recurre a abusar de ellas.'),
(25, 'Dagon', 1919, 3, 'La historia es el testimonio de un hombre torturado y adicto a la morfina que planea suicidarse por un incidente ocurrido a principios de la Primera Guerra Mundial cuando era oficial de la marina mercante.'),
(26, 'The Call of Cthulhu', 1928, 3, 'Cthulhu, el dios alado con cara de calamar creado por H. P. Lovecraft, emerge del mar después de siglos de letargo sólo para encontrar sus poderes oscuros inmediatamente sellados por un misterioso mago santo.'),
(27, 'Frankenstein', 1818, 4, 'La novela narra la historia de Víctor Frankenstein, un joven suizo, estudiante de medicina en Ingolstadt, obsesionado por conocer \"los secretos del cielo y la tierra\". En su afán por desentrañar \"la misteriosa alma del hombre\", Víctor crea un cuerpo a partir de la unión de distintas partes de cadáveres diseccionados.'),
(28, 'It', 1986, 5, 'Siete jóvenes marginados en Derry, Maine, están a punto de enfrentar su peor pesadilla: un antiguo mal que cambia de forma y emerge de las alcantarillas cada 27 años para aprovecharse de los niños de la ciudad. Uniéndose a lo largo de un horrible verano, los amigos deben superar sus propios miedos personales para luchar contra el payaso asesino y sediento de sangre conocido como Pennywise.'),
(29, 'The Shining', 1977, 5, 'Jack Torrance acepta una oferta de trabajo en un hotel de montaña que se encuentra a 65 kilómetros del pueblo más cercano. Además, las carreteras se encuentran cerradas al tráfico por las fuertes nevadas del invierno. Pronto comenzarán a manifestarse espíritus y apariciones extrañas.'),
(30, 'Carrie', 1947, 5, 'Carrie, una joven de apariencia insignificante, acosada por sus compañeras de instituto, vive con su madre, una fanática religiosa. Un día en las duchas, la primera menstruación de Carrie provoca las burlas de las demás chicas y desencadena una sucesión de hechos sobrenaturales y terroríficos.'),
(31, 'The Hellbound Heart', 1986, 6, 'Hellraiser es una novela desgarradora sobre el corazón humano y todos los grandes terrores y éxtasis que alberga en su reino infinito. Habla de la codicia y el amor, de la falta de amor y la desesperación, del deseo y la muerte, de la vida y el cautiverio, de campanas y sangre.'),
(32, 'Cabal', 1988, 6, 'Aaron Boone lleva un tiempo sufriendo espantosas pesadillas, en las que se ve cometiendo los crímenes más atroces. Su psicólogo, el doctor Decker, termina de convencerlo de que esos asesinatos han ocurrido realmente. Ahora Boone sabe que en el mundo no hay lugar para él, y deja que el infierno lo llame, quiere que la Muerte lo lleve hasta allí. Pero hasta la mismísima Muerte parece retroceder ante él. Parece que el único refugio para Boone es Midian, aquel terrible y legendario lugar que estrecha entre sus monstruosos brazos a los medio muertos, las razas de noche…'),
(33, 'We Have Always Lived in the Castle', 1962, 7, 'Nos narra la historia de los Blackwood, una familia rota que ha sido víctima de la desgracia cuando unos cuantos años antes de que comience el libro, gran parte de sus miembros murieron envenenados. Desde entonces los sobrevivientes: la frágil Constance, el anciano tío Julian y la rebelde Merricat, viven aislados en su mansión, a salvo de las miradas acusadoras del pueblo y de la crueldad de sus habitantes. No tienen más contacto con el mundo exterior que los pequeños viajes semanales hasta el mercado que hace Merricat y las esporádicas visitas de una vecina mitad altruista, mitad chismosa. Hasta una tarde en la que su codicioso primo Charles llega para quedarse y pone patas para arriba la vida de estos ermitaños, arrastrándolos a una desgracia peor que la que estaban viviendo.'),
(34, 'The Haunting of Hill House', 1959, 7, 'Hill House es una mansión en un lugar que nunca se especifica, construida por el difunto Hugh Crain. En la historia aparecen cuatro personajes principales, el doctor John Montague, un investigador de lo sobrenatural; Eleanor Vance, una joven tímida que se resiente de haber vivido como una reclusa que cuida a su madre inválida y exigente; Theodora, una extravagante artista bohemia y Luke Sanderson, el joven heredero de Hill House. Al encontrarse en la casa, cada uno de sus habitantes empezarán a experimentar extraños sucesos sobrenaturales que desencadenarán trágicas circunstancias.'),
(35, 'Nuestra Parte de Noche', 2019, 8, 'La herencia, el deseo de pervivir, la paternidad, el horror, lo íntimo y lo político. Una novela libre y osada, hechizante y genial.\r\n\r\nUn padre y un hijo atraviesan Argentina por carretera, desde Buenos Aires hacia las cataratas de Iguazú, en la frontera norte con Brasil. Son los años de la junta militar, hay controles de soldados armados y tensión en el ambiente. El hijo se llama Gaspar y el padre trata de protegerlo del destino que le ha sido asignado. La madre murió en circunstancias poco claras, en un accidente que acaso no lo fue.\r\n\r\nComo su padre, Gaspar está llamado a ser un médium en una sociedad secreta, la Orden, que contacta con la Oscuridad en busca de la vida eterna mediante atroces rituales. En ellos es vital disponer de un médium, pero el destino de estos seres dotados de poderes especiales es cruel, porque su desgaste físico y mental es rápido e implacable. Los orígenes de la Orden, regida por la poderosa familia de la madre de Gaspar, se remontan a siglos atrás, cuando el conocimiento de la Oscuridad llegó desde el corazón de África a Inglaterra y desde allí se extendió hasta Argentina.\r\n\r\nEl lector encontrará en estas páginas casas cuyo interior muta; pasadizos que esconden monstruos inimaginables; rituales con fieros y extáticos sacrificios humanos; andanzas en el Londres psicodélico de los años sesenta, donde la madre de Gaspar conoció a un joven cantante de aire andrógino llamado David; párpados humanos convertidos en fetiches; enigmáticas liturgias sexuales; la relación entre padres e hijos, con la carga de una herencia atroz; y, de fondo, la represión de la dictadura militar, los desaparecidos y, más adelante, la incierta llegada de la democracia, los primeros brotes del sida en Buenos Aires... El terror sobrenatural se entrecruza con terrores muy reales en esta novela perturbadora y deslumbrante, que consagra a Mariana Enriquez como una escritora fundamental de las letras latinoamericanas del siglo XXI.'),
(36, 'Los Peligros de Fumar en la Cama', 2009, 8, 'Doce cuentos en los que lo terroríﬁco se inﬁltra en lo cotidiano. Doce relatos perturbadores que llevan el género de terror a una nueva dimensión.\r\n\r\nUna niña desentierra en el jardín unos huesos que resultan no ser de un animal; la bucólica escena veraniega de unas chicas que se bañan en un paraje natural acaba convertida en un infierno de celos de inquietantes consecuencias; un mendigo despreciado siembra la desgracia en un barrio pudiente; Barcelona se transforma en un escenario perturbador, marcado por la culpa y del que es imposible escapar; una presencia fantasmal busca un sacrificio en un balneario; una chica siente una atracción fetichista por los corazones enfermos; un rockero fallecido de un modo atroz recibe un homenaje de sus fans que va más allá de lo imaginable; un chico que filma clandestinamente a parejas haciendo el amor y a mujeres con tacones altos caminando por las calles recibe una propuesta que le cambiará la vida.'),
(37, 'Handling the Undead', 2005, 9, 'Elvy es una abuela viuda que intenta aprender a jugar a la consola y aguanta a Marilyn Manson, sólo para que nieta Flora, antisistema total, se sienta feliz y no vuelva a autolesionarse con cuchillas de afeitar; ya que no soporta a sus padres, ni el mundo en el que vive ni la gente que le rodea.'),
(38, 'Let the Right One In', 2004, 9, 'Década de 1980; suburbio de Blackeberg, Estocolmo (Suecia). A sus doce años, Oskar es un chico que sufre el acoso y las palizas de sus compañeros de clase. Parece inteligente, y tiene un mórbido interés por la delincuencia y el análisis forense: en un cuaderno almacena viejos recortes de diarios sobre asesinatos. Para desahogarse, suele salir por la noche con un cuchillo, imaginando vengarse de sus acosadores. Es así como en una de esas noches conoce a Eli, quien tiene el aspecto de una chica pálida, de doce años, a la que parece no afectarle el frío y que sólo sale de noche. Aunque al principio Eli no se presenta como una persona amistosa, finalmente entabla amistad con Oskar. Mientras tanto se suceden una serie de asesinatos en el vecindario\r\n\r\nSon varios los personajes de la novela, y por medio de ellos el autor describe la vida en los suburbios de Estocolmo a principios de la década de 1980, y enfoca temas como el lado oscuro de la humanidad, el acoso escolar, drogas, robos, pedofilia, prostitución, pederastia, suicidio y asesinatos. Es también una historia de amor y nostalgia entre un niño que por su timidez vive aislado, y una niña que tiene mucha seguridad en sus acciones, pero también vive de manera aislada, por tener que ocultar su condición y no poder moverse por donde ilumina el sol.'),
(39, 'Heart-Shaped Box', 2007, 10, 'Judas Coyne, estrella de rock retirado de la actividad, pasa sus días de retiro coleccionando todo tipo de artículos relacionados con la magia negra, la brujería y la superstición. Un día, su asistente le informa que por internet se encuentra a la venta un traje que trae escondido un fantasma.'),
(40, 'The Fireman', 2016, 10, 'Nadie sabe exactamente cuándo comenzó o donde se originó. Una nueva y terrible plaga se está extendiendo como un reguero de pólvora por todo el país, golpeando a las ciudades una por una: Boston, Detroit, Seattle. Los médicos la llaman \'Trychophyton Draco Incendia\'.'),
(49, 'Título', 2023, 1, 'Sinopsis');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'webadmin', '$2a$10$syD4YBZdyUVYgb84zn4nu.th8bSWIIUEVHfRABRSNBGEPIMrEIzTy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id_author`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `FK_id_authors` (`id_author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id_author` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id_author`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
