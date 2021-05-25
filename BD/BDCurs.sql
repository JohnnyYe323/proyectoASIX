
/* Creació de les taules*/ 


CREATE TABLE IF NOT EXISTS tbl_professor(
	id_professor int(5) NOT NULL AUTO_INCREMENT,
	nom_prof varchar (20) NOT NULL,
	cognom1_prof varchar (20) NULL,
	cognom2_prof varchar (20) NULL,
	email_prof varchar(50) NULL,
	telf varchar (5) NULL, /* Son les extensions, per exemple: 32256*/
	dept int(5) NOT NULL,
	constraint pk_professor PRIMARY KEY (id_professor)
);

CREATE TABLE IF NOT EXISTS tbl_classe (
	id_classe int(5) NOT NULL AUTO_INCREMENT,
	codi_classe varchar(5) NOT NULL,
	nom_classe varchar(25) NULL,
	tutor int(5) NOT NULL,
	constraint pk_consta PRIMARY KEY (id_classe)
);

CREATE TABLE IF NOT EXISTS tbl_alumne(
	id_alumne int(10) NOT NULL AUTO_INCREMENT,
	dni_alu varchar(9) NULL,
	nom_alu varchar(20) NOT NULL,
	cognom1_alu varchar(20) NULL,
	cognom2_alu varchar(20) NULL,
	telf_alu varchar(9) NULL,
	email_alu varchar(50) NULL,
	classe int(5) NOT NULL,
	constraint pk_alumne PRIMARY KEY (id_alumne)
);

CREATE TABLE IF NOT EXISTS tbl_dept(
	id_dept int(5) NOT NULL AUTO_INCREMENT,
	codi_dept varchar(5) NOT NULL,
	nom_dept varchar(25) NULL,
	constraint pk_imparteix PRIMARY KEY (id_dept)
);

CREATE TABLE IF NOT EXISTS tbl_admin (
  id_admin int(11) NOT NULL AUTO_INCREMENT,
  nom_admin varchar(20) NOT NULL,
  cognom_admin varchar(40) NOT NULL,
  pass_admin varchar(10) NOT NULL,
  constraint pk_admin PRIMARY KEY (id_admin)
);


/* Modificacions de les taules per cració de les FK*/

ALTER TABLE tbl_alumne
    ADD CONSTRAINT alumne_classe_fk FOREIGN KEY (classe)
    REFERENCES tbl_classe(id_classe);
	
ALTER TABLE tbl_classe
    ADD CONSTRAINT classe_prof_fk FOREIGN KEY (tutor)
    REFERENCES tbl_professor(id_professor);

ALTER TABLE tbl_professor
    ADD CONSTRAINT prof_dept_fk FOREIGN KEY (dept)
    REFERENCES tbl_dept(id_dept);

INSERT INTO `tbl_alumne` (`id_alumne`, `dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`,`classe`) VALUES
(1, '11567682Q', 'Xavier', 'Mendizabal', 'Vivas', '632398469', 'xavier.mendizabal.vivas@hotmail.com',1),
(2, '48168446Y', 'David', 'Hernandez', 'Anaya', '699445728', 'david.hernandez.anaya@hotmail.com',2),
(3, '34201566Z', 'Tomas', 'Losada', 'Mateo', '662372322', 'tomas.losada.mateo@hotmail.com',1),
(4, '97691825S', 'Marc', 'Prieto', 'Estrella', '641215537', 'marc.prieto.estrella@hotmail.com',1),
(5, '01178169V', 'Roberto', 'Mallo', 'Pulido', '742511064', 'roberto.mallo.pulido@hotmail.com',2),
(6, '35648330D', 'Julian', 'Pazos', 'Ferrera', '667744269', 'julian.pazos.ferrera@hotmail.com',3),
(7, '76626924D', 'Joan', 'Edo', 'Portero', '654458077', 'joan.edo.portero@hotmail.com',3),
(8, '82074912X', 'Gabriel', 'Collantes', 'Macho', '652657399', 'gabriel.collantes.macho@hotmail.com',2),
(9, '01636342F', 'Francisco', 'Torrecillas', 'Pernas', '769482015', 'francisco.torrecillas.pernas@hotmail.com',3),
(10, '34446809P', 'Mariano', 'Valvidia', 'Portero', '620761162', 'mariano.valvidia.portero@hotmail.com',1),
(11, '07353020N', 'Pedro', 'Miguez', 'Cea', '611247948', 'pedro.miguez.cea@hotmail.com',3),
(12, '14698506B', 'Manuel', 'Cabral', 'Mendoza', '689449823', 'manuel.cabral.mendoza@hotmail.com',3),
(13, '62783866F', 'Lorenzo', 'Olmo', 'Fresneda', '664158867', 'lorenzo.olmo.fresneda@hotmail.com',2),
(14, '36639876W', 'Antonio', 'Solana', 'Sanjuan', '699003847', 'antonio.solana.sanjuan@hotmail.com',1),
(15, '61832885F', 'Albert', 'Barrul', 'Dura', '679032158', 'albert.barrul.dura@hotmail.com',3),
(16, '97820370J', 'Gabriel', 'Barriga', 'Regueira', '668395897', 'gabriel.barriga.regueira@hotmail.com',1),
(17, '97154748B', 'Tomas', 'Moyano', 'Echeverria', '678082591', 'tomas.moyano.echeverria@hotmail.com',3),
(18, '43027019E', 'Cristian', 'Almenara', 'Polanco', '675593012', 'cristian.almenara.polanco@hotmail.com',3),
(19, '74858350C', 'Luis', 'Cerro', 'Feliu', '649516316', 'luis.cerro.feliu@hotmail.com',3),
(20, '81319641J', 'Felipe', 'Sempere', 'Goncalves', '628350831', 'felipe.sempere.goncalves@hotmail.com',2);

INSERT INTO `tbl_professor` (`id_professor`, `nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`,`dept`) VALUES
(1, 'Agnes', 'Plans', 'Berenguer', 'aplans@fje.edu', '32256','1'),
(2, 'Sergio', 'Jimenez', 'Garcia', 'sjimenez@fje.edu', '32257','1'),
(3, 'Gerard', 'Orogbitg', 'Boyer', 'gorobitg@fje.edu', '32258','2'),
(4, 'Nuria', 'Garres', 'Martinez', 'ngarres@fje.edu', '32259','2'),
(5, 'Antoni', 'Fernandez', 'Fernandez', 'tfernandez@fje.edu', '32260','2'),
(6, 'Danny', 'Larrea', 'Garcia', 'dlarrea@fje.edu', '32261','1'),
(7, 'Andrea', 'Santos', 'Herrera', 'asantos@fje.edu', '32262','2'),
(8, 'Richard', 'owens', 'owens', 'rowens@fje.edu', '32263','1'),
(9, 'Eustaquio', 'Avichuela', 'Rosales', 'eavichuela@fje.edu', '32264','2'),
(10, 'Roberto', 'Sanchez', 'Gonzalez', 'rsanchez@fje.edu', '32265','3'),
(11, 'Jose', 'Martinez', 'Garcia', 'jmartinez@fje.edu', '32266','2'),
(12, 'Rodrigo', 'Prieto', 'Sanchez', 'rprieto@fje.edu', '32267','1'),
(13, 'Jesus', 'Tomasdado', 'Pachi', 'jtomasdado@fje.edu', '32268','4'),
(14, 'Sergio', 'Pereira', 'Jimenez', 'spereira@csym.es', '32269','5'),
(15, 'Victor', 'Quesada', 'Garcia', 'vquesada@fje.edu', '32260','5'),
(16, 'Francisco', 'Sanchis', 'Chas', 'fsanchis@fje.edu', '32261','5'),
(17, 'Edgar', 'Pereira', 'Lorca', 'epereira@fje.edu', '32262','4'),
(18, 'Jose', 'Perez', 'Marin', 'jperez@fje.edu', '32263','4');

INSERT INTO `tbl_classe` (`id_classe`, `codi_classe`, `nom_classe`, `tutor`) VALUES
(1, 'ASIX', 'Administracion de sistema', 2),
(2, 'DAW', 'Desarrollo de aplicacione', 6),
(3, 'EAS', 'Deportes', 4);

INSERT INTO `tbl_dept` (`id_dept`, `codi_dept`, `nom_dept`) VALUES
(1, '30401', 'BTX'),
(2, '30501', 'EAS'),
(3, '30601', 'EDIN'),
(4, '30801', 'ASIX'),
(5, '30901', 'AD'),
(6, '31001', 'Administracion');

INSERT INTO `tbl_admin` (`id_admin`, `nom_admin`, `cognom_admin`, `pass_admin`) VALUES
(1, 'admin', 'admin', 'admin');