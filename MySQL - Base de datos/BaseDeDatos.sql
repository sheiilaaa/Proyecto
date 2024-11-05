CREATE SCHEMA COACHING;

USE COACHING;

CREATE TABLE CLIENTES(
	ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
	DNI_Cliente VARCHAR(100) UNIQUE,
	Nombre_Cliente VARCHAR (100) NOT NULL,
	Apellido_Cliente VARCHAR (100) NOT NULL,
	FechaNacimiento_Cliente DATE NOT NULL,
	
	NumTelefono_Cliente VARCHAR(100) NOT NULL,
	Correo_Cliente VARCHAR(100) NOT NULL,

	TipoVia_Cliente ENUM('C/', 'Paseo', 'Av.') NULL,
	NombreVia_Cliente VARCHAR(100) NULL,
	NumeroVia_Cliente INT NULL,

	Contrasena_Cliente VARCHAR(100) NOT NULL

	/*Claves Foráneas*/
);

CREATE TABLE ESPECIALISTAS(
	ID_Especialista INT AUTO_INCREMENT PRIMARY KEY,
	DNI_Especialista VARCHAR(100) UNIQUE NOT NULL,
	Nombre_Especialista VARCHAR (100) NOT NULL,
	Apellido_Especialista VARCHAR (100) NOT NULL,
	FechaNacimiento_Especialista INT NOT NULL,

	NumTelefono_Especialista INT NOT NULL,
	Correo_Especialista VARCHAR(100) NOT NULL,

	TipoVia_Especialista ENUM('C/', 'Paseo', 'Av.') NOT NULL,
	NombreVia_Especialista VARCHAR(100) NOT NULL,
	NumeroVia_Especialista INT NOT NULL,

	CuentaBancaria_Especialista VARCHAR(100) NOT NULL,/*ENCRIPTAR*/

	Cuota_Especialista DECIMAL NOT NULL,

	Contrasena_Especialista VARCHAR(100)

	/*Claves Foráneas*/
);

CREATE TABLE ESPECIALISTA_ESPECIALIDAD(
	/*Claves Foráneas*/
	ID_Especialista_EspeEspe INT,
	ID_Especialidad_EspeEspe INT,
	
    /*Primary key*/
	PRIMARY KEY (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
);


CREATE TABLE CITAS(
	ID_Cita INT AUTO_INCREMENT PRIMARY KEY,
	FechaHora_Cita DATETIME NOT NULL,
	Duracion INT NOT NULL,
	Coste_Cita DECIMAL NOT NULL,

	/*Claves Foráneas*/
	ID_Especialista_Cita INT,
	ID_Cliente_Cita INT
);


CREATE TABLE ESPECIALIDAD(
	ID_Especialidad INT AUTO_INCREMENT PRIMARY KEY,
	Especialidad_Especialista ENUM ('Coaching Empresarial','Coaching Personal','Coaching con Inteligencia Emocional',
									'Coaching Deportivo','Coaching Ontológico','Coaching Cognitivo',
                                    'Coaching PNL (Programación Neurolingüística)','Coaching Coercitivo') UNIQUE
	/*Claves Foráneas*/
);

CREATE TABLE PAGOS(
	ID_Pago INT AUTO_INCREMENT PRIMARY KEY,
	Estado_Pago BOOLEAN NOT NULL, /*BOOLEAN --> CHECK BOX*/
	Metodos_Pago ENUM('Efectivo','Tarjeta_Credito') NOT NULL,
	Fecha_Pago DATETIME NOT NULL,
	Cantidad_Pago INT NOT NULL,

	/*Claves Foráneas*/
	ID_Pago_Cliente INT
);

CREATE TABLE DISPONIBILIDAD_ESPECIALISTA(
	Fecha_Disponibilidad DATE,
	Hora_Disponibilidad TIME,
	Disponibilidad_Especialista ENUM('SI','NO') NOT NULL,
    
	/*Claves Foráneas*/
	ID_Especialista_DispoEspe INT,
    
	/*Primary key*/
	PRIMARY KEY (Fecha_Disponibilidad, Hora_Disponibilidad, ID_Especialista_DispoEspe)
);

/*RELACIONES*/

ALTER TABLE ESPECIALISTA_ESPECIALIDAD ADD
	CONSTRAINT FK_ESPECIALISTA_ESPECIALIDAD_ESPECIALIDAD FOREIGN KEY (ID_Especialista_EspeEspe) REFERENCES ESPECIALISTAS (ID_Especialista) ON UPDATE CASCADE;
ALTER TABLE ESPECIALISTA_ESPECIALIDAD ADD
	CONSTRAINT FK_ESPECIALISTA_ESPECIALIDAD_ESPECIALISTA FOREIGN KEY (ID_Especialidad_EspeEspe) REFERENCES ESPECIALIDAD (ID_Especialidad) ON UPDATE CASCADE;

ALTER TABLE CITAS ADD
	CONSTRAINT FK_CITAS_ESPECIALISTAS FOREIGN KEY (ID_Especialista_Cita) REFERENCES ESPECIALISTAS (ID_Especialista) ON UPDATE CASCADE;
ALTER TABLE CITAS ADD
	CONSTRAINT FK_CITAS_CLIENTES FOREIGN KEY (ID_Cliente_Cita) REFERENCES CLIENTES (ID_Cliente) ON UPDATE CASCADE;

ALTER TABLE PAGOS ADD
	CONSTRAINT FK_PAGOS_CLIENTE FOREIGN KEY (ID_Pago_Cliente) REFERENCES CLIENTES (ID_Cliente) ON UPDATE CASCADE;

ALTER TABLE DISPONIBILIDAD_ESPECIALISTA ADD
	CONSTRAINT FK_DISPONIBILIDAD_ESPECIALISTA_ESPECIALISTAS FOREIGN KEY (ID_Especialista_DispoEspe) REFERENCES ESPECIALISTAS (ID_Especialista) ON UPDATE CASCADE;
