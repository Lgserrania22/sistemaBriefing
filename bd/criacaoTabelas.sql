CREATE TABLE cargo(
	idCargo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nomeCargo VARCHAR(20) NOT NULL
);
CREATE TABLE usuario(
	idUsuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nomeUsuario VARCHAR(50) NOT NULL,
	loginUsuario VARCHAR(20) NOT NULL,
	senhaUsuario VARCHAR(20) NOT NULL,
	idCargo INT NOT NULL,
	FOREIGN KEY usuario(idCargo) REFERENCES cargo(idCargo) ON UPDATE CASCADE
);
CREATE TABLE cliente(
	idCliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nomeCliente VARCHAR(30) NOT NULL,
	empresaCliente VARCHAR(30) DEFAULT NULL,
	emailCliente VARCHAR(30) DEFAULT NULL,
	telefoneCliente VARCHAR(20) DEFAULT NULL
);
CREATE TABLE pergunta(
	idPergunta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	textoPergunta VARCHAR(100) NOT NULL
);
CREATE TABLE projeto(
	idProjeto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idCliente INT NOT NULL,
	idUsuario INT NOT NULL,
	nomeProjeto VARCHAR(30) NOT NULL,
	valorProjeto REAL NOT NULL,
	FOREIGN KEY projeto_cliente(idCliente) REFERENCES cliente(idCliente) ON UPDATE CASCADE,
	FOREIGN KEY projeto_usuario(idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE
);
CREATE TABLE briefing(
	idBriefing INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idProjeto INT NOT NULL,
	dataBriefing DATETIME NOT NULL,
	previsaoEntrega DATETIME,
	publicoAlvo VARCHAR(50),
	visaoGeral VARCHAR(250),
	recursosNecessarios VARCHAR(200),
	requisitosIniciais VARCHAR(200),
	FOREIGN KEY briefing(idProjeto) REFERENCES projeto(idProjeto) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE pergunta_briefing(
	idBriefing INT NOT NULL,
	idPergunta INT NOT NULL,
	respostaPergunta VARCHAR(200) NOT NULL,
	PRIMARY KEY (idBriefing, idPergunta),
	FOREIGN KEY pergunta_briefing_briefing(idBriefing) REFERENCES briefing(idBriefing) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY pergunta_briefing_pergunta(idPergunta) REFERENCES pergunta(idPergunta) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE usuario_projeto(
	idProjeto INT NOT NULL,
	idUsuario INT NOT NULL,
	PRIMARY KEY (idProjeto, idUsuario),
	FOREIGN KEY usuario_projeto_projeto(idProjeto) REFERENCES projeto(idProjeto) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY usuario_projeto_usuario(idUsuario) REFERENCES usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
)