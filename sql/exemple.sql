--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: error_code; Type: TABLE; Schema: public; Owner: scripty; Tablespace: 
--

CREATE TABLE error_code (
    code integer NOT NULL,
    description character varying(100) NOT NULL
);


ALTER TABLE error_code OWNER TO scripty;

--
-- Name: inventory; Type: TABLE; Schema: public; Owner: scripty; Tablespace: 
--

CREATE TABLE inventory (
    id integer NOT NULL,
    server_name character varying(100) NOT NULL,
    owner character varying(50),
    service1 integer DEFAULT 0 NOT NULL,
    service2 integer DEFAULT 0 NOT NULL,
    service3 integer DEFAULT 0 NOT NULL,
    service4 integer DEFAULT 0 NOT NULL,
    service5 integer DEFAULT 0 NOT NULL,
    client_ldap integer DEFAULT 0 NOT NULL,
    client_ansible integer DEFAULT 0 NOT NULL,
    client_nagios integer DEFAULT 0 NOT NULL
);


ALTER TABLE inventory OWNER TO scripty;

--
-- Name: inventaire_id_seq; Type: SEQUENCE; Schema: public; Owner: scripty
--

CREATE SEQUENCE inventaire_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE inventaire_id_seq OWNER TO scripty;

--
-- Name: inventaire_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: scripty
--

ALTER SEQUENCE inventaire_id_seq OWNED BY inventory.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: scripty
--

ALTER TABLE ONLY inventory ALTER COLUMN id SET DEFAULT nextval('inventaire_id_seq'::regclass);


--
-- Data for Name: error_code; Type: TABLE DATA; Schema: public; Owner: scripty
--

INSERT INTO error_code VALUES (0, 'L''utilisateur n''est pas root');
INSERT INTO error_code VALUES (1, 'L''utilisateur est root');
INSERT INTO error_code VALUES (5, 'sshpass est déjà installé');
INSERT INTO error_code VALUES (6, 'Installation de ssh pass réussi');
INSERT INTO error_code VALUES (8001, 'Les services NAGIOS-PLUGINS & NAGIOS-NRPE-SERVEUR sont déjà installés');
INSERT INTO error_code VALUES (8002, 'Les services NAGIOS-PLUGINS & NAGIOS-NRPE-SERVEUR sont correctement installés');
INSERT INTO error_code VALUES (8005, 'Le fichier de configuration est créé');
INSERT INTO error_code VALUES (8006, 'Envoi du fichier vers le serveur nagios est effectué');
INSERT INTO error_code VALUES (8007, 'Le redémarrage du serveur nagios est effecuté');
INSERT INTO error_code VALUES (6001, 'Le service OpenLdap est déjà installé');
INSERT INTO error_code VALUES (6002, 'Le service OpenLdap est correctement installé');
INSERT INTO error_code VALUES (8003, 'Configuration du hôte pour $newhost existe déja');
INSERT INTO error_code VALUES (8010, 'INSTALLATION DE NAGIOS TERMINE');
INSERT INTO error_code VALUES (6010, 'INSTALLATION DE OpenLDAP TERMINE');


--
-- Name: inventaire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: scripty
--

SELECT pg_catalog.setval('inventaire_id_seq', 1, false);


--
-- Data for Name: inventory; Type: TABLE DATA; Schema: public; Owner: scripty
--



--
-- Name: error_code_pkey; Type: CONSTRAINT; Schema: public; Owner: scripty; Tablespace: 
--

ALTER TABLE ONLY error_code
    ADD CONSTRAINT error_code_pkey PRIMARY KEY (code);


--
-- Name: inventaire_pkey; Type: CONSTRAINT; Schema: public; Owner: scripty; Tablespace: 
--

ALTER TABLE ONLY inventory
    ADD CONSTRAINT inventaire_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: scripty
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM scripty;
GRANT ALL ON SCHEMA public TO scripty;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

