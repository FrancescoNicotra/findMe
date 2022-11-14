/*
 Navicat Premium Data Transfer

 Source Server         : TEST10_VPS
 Source Server Type    : MySQL
 Source Server Version : 100323
 Source Host           : localhost:3306
 Source Schema         : thewoice_potenziamentoro

 Target Server Type    : MySQL
 Target Server Version : 100323
 File Encoding         : 65001

 Date: 18/10/2022 12:42:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gramm_parole_escluse_ita
-- ----------------------------
DROP TABLE IF EXISTS `gramm_parole_escluse_ita`;
CREATE TABLE `gramm_parole_escluse_ita` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `parola` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_woice_customer` int(11) DEFAULT NULL,
  `ck_personalizzato` tinyint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parola` (`parola`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of gramm_parole_escluse_ita
-- ----------------------------
BEGIN;
INSERT INTO `gramm_parole_escluse_ita` VALUES (1, 'Alcuno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (2, 'alquanto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (3, 'altrettanto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (4, 'Altri', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (5, 'altro', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (6, 'altrui', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (7, 'cedesta', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (8, 'cela', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (9, 'cele', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (10, 'celi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (11, 'celo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (12, 'certo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (13, 'certune', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (14, 'Certuni', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (15, 'che', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (16, 'chi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (17, 'Chiunque', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (18, 'ci', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (19, 'codeste', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (20, 'codesti', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (21, 'codesto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (22, 'cosiffatto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (23, 'cui', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (24, 'Egli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (25, 'Ella', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (26, 'essa', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (27, 'Esse', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (28, 'Essi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (29, 'esso', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (30, 'gli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (31, 'gliela', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (32, 'gliele', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (33, 'glieli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (34, 'glielo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (35, 'i', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (36, 'il', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (37, 'Ilquale', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (38, 'Io', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (39, 'l\'', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (40, 'la', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (41, 'laquale', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (42, 'le', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (43, 'lei', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (44, 'li', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (45, 'lo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (46, 'loro', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (47, 'lui', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (48, 'me', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (49, 'medesimo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (50, 'mela', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (51, 'mele', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (52, 'meli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (53, 'melo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (54, 'mi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (55, 'Mio', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (56, 'molto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (57, 'ne', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (58, 'nessuno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (59, 'Niente', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (60, 'Noi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (61, 'nostro', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (62, 'nulla', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (63, 'ognuno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (64, 'parecchio', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (65, 'poco', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (66, 'proprio', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (67, 'qualcheduno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (68, 'qualcuno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (69, 'quale', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (70, 'quanto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (71, 'quegli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (72, 'quella', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (73, 'quelle', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (74, 'quelli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (75, 'quello', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (76, 'questa', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (77, 'queste', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (78, 'questi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (79, 'questo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (80, 'sé', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (81, 'si', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (82, 'siffatto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (83, 'stesso', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (84, 'suo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (85, 'tale', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (86, 'taluno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (87, 'tanto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (88, 'te', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (89, 'tela', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (90, 'tele', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (91, 'teli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (92, 'telo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (93, 'ti', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (94, 'troppo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (95, 'Tu', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (96, 'tuo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (97, 'tutto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (98, 'un', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (99, 'un\'', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (100, 'una', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (101, 'Uno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (102, 'vela', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (103, 'vele', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (104, 'veli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (105, 'velo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (106, 'veruno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (107, 'vi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (108, 'Voi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (109, 'vostro', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (110, 'voglio', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (112, 'vorrei', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (113, 'sapere', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (114, 'devo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (115, 'dovrei', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (116, 'visita', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (117, 'delle', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (118, 'della', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (119, 'degli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (120, 'dei', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (121, 'del', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (122, 'cosa', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (123, 'mia', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (124, 'dove', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (125, 'non', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (126, 'dalle', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (127, 'alle', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (128, 'per', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (131, 'più', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (132, 'ore', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (140, 'piu', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (141, 'come', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (143, 'sono', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (144, 'fare', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (145, 'fai', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (146, 'avere', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (147, 'ho', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (148, 'ha', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (149, 'hai', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (150, 'possso', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (151, 'quali', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (152, 'nel', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (153, 'anche', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (154, 'dato', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (155, 'posso', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (156, 'puoi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (157, 'potrei', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (158, 'potresti', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (159, 'dire', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (160, 'dirmi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (162, 'se', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (163, 'in', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (165, 'su', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (166, 'l', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (168, 'parlare', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (169, 'chiedere', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (170, 'andare', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (171, 'telefonare', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (172, 'richiedere', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (173, 'recarmi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (174, 'trovare', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (175, 'trovo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (176, 'chiedo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (177, 'vado', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (178, 'e', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (179, 'a', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (181, 'o', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (182, 'u', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (183, 'di', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (184, 'é', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (185, 'è', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (186, 'qual', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (189, 'da', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (191, 'con', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (193, 'tra', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (194, 'fra', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (196, 'bisogno', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (199, 'dal', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (203, 'dovo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (204, 'dopo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (205, 'prima', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (206, 'senza', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (207, 'via', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (208, 'al', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (209, 'ai', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (210, 'agli', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (211, 'deve', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (212, 'siamo', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (213, 'ufficio', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (214, 'uffici', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (215, 'fa', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (218, 'farei', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (219, 'farò', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (220, 'sai', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (222, 'so', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (223, 'faccio', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (224, 'qui', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (225, 'sto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (226, 'stai', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (227, 'starò', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (228, 'prendi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (229, 'dammi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (230, 'dimmi', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (231, 'po', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (232, 'avete', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (233, 'avrò', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (234, 'avrai', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (235, 'sì', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (237, 'nì', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (238, 'dice', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (239, 'dell', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (240, 'rivolgere', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (241, 'rivolto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (242, 'chiesto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (243, 'chiamato', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (244, 'rivolta', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (245, 'chiesta', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (246, 'chiamata', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (247, 'vedere', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (248, 'visto', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (249, 'visti', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (250, 'vista', NULL, 0);
INSERT INTO `gramm_parole_escluse_ita` VALUES (251, 'trattamento', 95, 1);
INSERT INTO `gramm_parole_escluse_ita` VALUES (252, 'grazie', NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
