CREATE DATABASE dbBlazeRestaurantes;
USE dbBlazeRestaurantes;



CREATE TABLE pedido (
    id_pedidos INT PRIMARY KEY AUTO_INCREMENT,
    fk_produto_id_produto INT,
    fk_funcionario_id_funcionario INT,
    fk_Mesa_Id_mesa INT
);

CREATE TABLE produto (
    id_produto INT PRIMARY KEY AUTO_INCREMENT,
    valor_produto VARCHAR(100),
    nome_produto VARCHAR(100),
    tipo_produto VARCHAR(100)
);

CREATE TABLE funcionario (
    id_funcionario INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(100),
    password VARCHAR(100),
    role VARCHAR(100),
    name VARCHAR(100)
);

CREATE TABLE mesa (
    Id_mesa INT PRIMARY KEY AUTO_INCREMENT,
    status_mesa BOOLEAN
);


INSERT INTO funcionario (name,password, role, login)
	VALUES
	("MATUI", "doblo", "admin", "matui@gmail"),
    ("Murilui", "123", "admin", "murilui@gmail"),
    ("luqui", "senha", "admin", "luqui@gmail"),
    ("user", "senha123", "user", "user@gmail");
    
    INSERT INTO produto (id_produto, valor_produto, nome_produto, tipo_produto)
VALUES
    (1, '54,00', 'Carpaccio de Polvo com Vinagrete de Limão Siciliano', 'Entrada'),
    (2, '49,00', 'Bruschetta de Tomate Heirloom com Pesto de Manjericão', 'Entrada'),
    (3, '78,00', 'Terrine de Berinjela com Queijo de Cabra e Tomate Confit', 'Entrada'),
    (4, '125,00', 'Risoto de Açafrão com Frutos do Mar Frescos', 'Prato Principal'),
    (5, '138,00', 'Filet Mignon ao Molho de Vinho Tinto e Ervas Mediterrâneas', 'Prato Principal'),
    (6, '100,00', 'Tagliatelle Nero di Sepia com Molho de Lagosta e Tomate Cereja', 'Prato Principal'),
    (7, '134,00', 'Moussaka Vegetariana com Camadas de Berinjela, Abobrinha e Gratin de Queijo Feta', 'Prato Vegetariano'),
    (8, '125,00', 'Torta de Espinafre com Ricota e Pinhões', 'Prato Vegetariano'),
    (9, '142,00', 'Pisois à Provençal', 'Prato do Pisois'),
    (10, '122,00', 'Pisois com Presunto de Parma e Parmesão', 'Prato do Pisois'),
    (11, '78,00', 'Millefeuille de Pistache com Creme de Baunilha e Framboesas Frescas', 'Sobremesa'),
    (12, '85,00', 'Tiramisu de Limoncello', 'Sobremesa'),
    (13, '96,00', 'Panna Cotta de Lavanda com Mel e Frutas Vermelhas', 'Sobremesa');
    
    
	 INSERT INTO mesa(status_mesa)
	VALUES
	(true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true),
    (true);
    
    
