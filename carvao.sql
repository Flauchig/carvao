-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: carvao
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (19,'flauchig','8465546546','adijsdioa','adiojsai','oiwdjsaoijd','sdiojsadasij','jidiaosjdoias'),(23,'rafael','454','454454','445','sdushadusha','centro','cidade');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `embalagem`
--

DROP TABLE IF EXISTS `embalagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `embalagem` (
  `idembalagem` int NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(1) DEFAULT NULL,
  `estoque_minimo` int DEFAULT NULL,
  `estoque_ideal` int DEFAULT NULL,
  `valor` decimal(4,2) DEFAULT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idembalagem`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embalagem`
--

LOCK TABLES `embalagem` WRITE;
/*!40000 ALTER TABLE `embalagem` DISABLE KEYS */;
INSERT INTO `embalagem` VALUES (1,'3',100,285,11.00,'bage'),(3,'5',100,305,15.00,'candiota');
/*!40000 ALTER TABLE `embalagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `embalagem_estoque`
--

DROP TABLE IF EXISTS `embalagem_estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `embalagem_estoque` (
  `idembalagem_estoque` int NOT NULL AUTO_INCREMENT,
  `qtd` int DEFAULT NULL,
  `operacao` varchar(1) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `embalagem_idembalagem` int NOT NULL,
  PRIMARY KEY (`idembalagem_estoque`),
  KEY `fk_Embalagem_estoque_Embalagem1_idx` (`embalagem_idembalagem`),
  CONSTRAINT `fk_Embalagem_estoque_Embalagem1` FOREIGN KEY (`embalagem_idembalagem`) REFERENCES `embalagem` (`idembalagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embalagem_estoque`
--

LOCK TABLES `embalagem_estoque` WRITE;
/*!40000 ALTER TABLE `embalagem_estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `embalagem_estoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque_produto`
--

DROP TABLE IF EXISTS `estoque_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estoque_produto` (
  `idestoque_produto` int NOT NULL AUTO_INCREMENT,
  `qtd` int DEFAULT NULL,
  `operacao` varchar(1) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`idestoque_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque_produto`
--

LOCK TABLES `estoque_produto` WRITE;
/*!40000 ALTER TABLE `estoque_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `estoque_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `idpedido` int NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `cliente_idcliente` int NOT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `fk_Pedido_Cliente_idx` (`cliente_idcliente`),
  CONSTRAINT `fk_Pedido_Cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (2,'2022-11-10','2020-05-05','2020-03-28',19);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_item`
--

DROP TABLE IF EXISTS `pedido_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido_item` (
  `idpedido_item` int NOT NULL AUTO_INCREMENT,
  `qtd` int DEFAULT NULL,
  `pedido_idpedido` int NOT NULL,
  `embalagem_idembalagem` int NOT NULL,
  PRIMARY KEY (`idpedido_item`),
  KEY `fk_pedido_item_Pedido1_idx` (`pedido_idpedido`),
  KEY `fk_pedido_item_Embalagem1_idx` (`embalagem_idembalagem`),
  CONSTRAINT `fk_pedido_item_Embalagem1` FOREIGN KEY (`embalagem_idembalagem`) REFERENCES `embalagem` (`idembalagem`),
  CONSTRAINT `fk_pedido_item_Pedido1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_item`
--

LOCK TABLES `pedido_item` WRITE;
/*!40000 ALTER TABLE `pedido_item` DISABLE KEYS */;
INSERT INTO `pedido_item` VALUES (7,5,2,1);
/*!40000 ALTER TABLE `pedido_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-17 11:57:12
