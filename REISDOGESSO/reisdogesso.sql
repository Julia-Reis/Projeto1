
CREATE DATABASE IF NOT EXISTS reisdogesso DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE reisdogesso;

-- --------------------------------------------------------

--
-- Estrutura da tabela imagens_servico
--

DROP TABLE IF EXISTS imagens_servico;
CREATE TABLE IF NOT EXISTS imagens_servico (
  id_imagem_servico int(11) NOT NULL AUTO_INCREMENT,
  cod_servico int(11) DEFAULT NULL,
  arquivo varchar(200) DEFAULT NULL,
  PRIMARY KEY (id_imagem_servico),
  FOREIGN KEY cod_servico references id_servico(servico)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Estrutura da tabela orcamento
--

DROP TABLE IF EXISTS orcamento;
CREATE TABLE IF NOT EXISTS orcamento (
  id_orcamento int(11) NOT NULL AUTO_INCREMENT,
  cod_usuario int(11) NOT NULL,
  valor_orcamento decimal(10,0) NOT NULL,
  data_orcamento datetime NOT NULL,
  situacao binary(1) DEFAULT NULL,
  PRIMARY KEY (id_orcamento),
  FOREIGN KEY (cod_usuario) references usuario(id_usuario)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela orcamento_item
--

DROP TABLE IF EXISTS orcamento_item;
CREATE TABLE IF NOT EXISTS orcamento_item (
  cod_orcamento int(11) NOT NULL,
  cod_servico int(11) NOT NULL,
  nome_servico varchar(100) NOT NULL,
  preco_metro decimal(10,2) DEFAULT NULL,
  preco_total decimal(10,2) DEFAULT NULL,
  metragem decimal(10,2) DEFAULT NULL,
  observacao varchar(100) DEFAULT NULL,
    FOREIGN KEY (cod_orcamento) references orcamento(id_orcamento),
    FOREIGN KEY (cod_servico) references usuario(id_usuario)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela servico
--

DROP TABLE IF EXISTS servico;
CREATE TABLE IF NOT EXISTS servico (
  id_servico int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  descricao varchar(1000) NOT NULL,
  preco float NOT NULL,
  PRIMARY KEY (id_servico)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Estrutura da tabela usuario
--

DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario (
  id_usuario int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(30) NOT NULL,
  telefone varchar(30) NOT NULL,
  cidade varchar(100) NOT NULL,
  endereco varchar(100) NOT NULL,
  email varchar(40) NOT NULL,
  senha varchar(32) NOT NULL,
  permissao int(11) NOT NULL,
  PRIMARY KEY (id_usuario)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
