--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.3

-- Started on 2025-05-08 22:08:12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 25304)
-- Name: instruktorzy; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instruktorzy (
    id_instruktora integer NOT NULL,
    email character varying(100) NOT NULL,
    imie character varying(50),
    nazwisko character varying(50),
    jezyk character varying(50),
    adres_zdjecia character varying(100),
    poziom character varying(50),
    placa numeric(10,2)
);


ALTER TABLE public.instruktorzy OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 25303)
-- Name: instruktorzy_id_instruktora_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.instruktorzy_id_instruktora_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.instruktorzy_id_instruktora_seq OWNER TO postgres;

--
-- TOC entry 4830 (class 0 OID 0)
-- Dependencies: 217
-- Name: instruktorzy_id_instruktora_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.instruktorzy_id_instruktora_seq OWNED BY public.instruktorzy.id_instruktora;


--
-- TOC entry 216 (class 1259 OID 25295)
-- Name: klienci; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.klienci (
    id_klienta integer NOT NULL,
    email character varying(100) NOT NULL,
    haslo character varying(100) NOT NULL,
    imie character varying(50),
    nazwisko character varying(50),
    adres text,
    nr_telefonu character varying(20),
    adres_zdjecia text
);


ALTER TABLE public.klienci OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 25294)
-- Name: klienci_id_klienta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.klienci_id_klienta_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.klienci_id_klienta_seq OWNER TO postgres;

--
-- TOC entry 4831 (class 0 OID 0)
-- Dependencies: 215
-- Name: klienci_id_klienta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.klienci_id_klienta_seq OWNED BY public.klienci.id_klienta;


--
-- TOC entry 220 (class 1259 OID 25311)
-- Name: kursy; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kursy (
    id_kursu integer NOT NULL,
    cena numeric(10,2) NOT NULL,
    jezyk character varying(50),
    poziom character varying(50),
    data_rozpoczecia date,
    data_zakonczenia date,
    liczba_miejsc integer,
    id_instruktora integer
);


ALTER TABLE public.kursy OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 25310)
-- Name: kursy_id_kursu_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kursy_id_kursu_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.kursy_id_kursu_seq OWNER TO postgres;

--
-- TOC entry 4832 (class 0 OID 0)
-- Dependencies: 219
-- Name: kursy_id_kursu_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kursy_id_kursu_seq OWNED BY public.kursy.id_kursu;


--
-- TOC entry 222 (class 1259 OID 25323)
-- Name: transakcje; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transakcje (
    id_transakcji integer NOT NULL,
    id_kursu integer,
    id_klienta integer,
    cena_ostateczna numeric(10,2),
    status character varying(50),
    data date
);


ALTER TABLE public.transakcje OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 25322)
-- Name: transakcje_id_transakcji_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.transakcje_id_transakcji_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.transakcje_id_transakcji_seq OWNER TO postgres;

--
-- TOC entry 4833 (class 0 OID 0)
-- Dependencies: 221
-- Name: transakcje_id_transakcji_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.transakcje_id_transakcji_seq OWNED BY public.transakcje.id_transakcji;


--
-- TOC entry 224 (class 1259 OID 25340)
-- Name: znizki; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.znizki (
    id_znizki integer NOT NULL,
    nazwa_znizki character varying(100),
    wartosc numeric(5,2),
    opis text
);


ALTER TABLE public.znizki OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 25339)
-- Name: znizki_id_znizki_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.znizki_id_znizki_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.znizki_id_znizki_seq OWNER TO postgres;

--
-- TOC entry 4834 (class 0 OID 0)
-- Dependencies: 223
-- Name: znizki_id_znizki_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.znizki_id_znizki_seq OWNED BY public.znizki.id_znizki;


--
-- TOC entry 4655 (class 2604 OID 25307)
-- Name: instruktorzy id_instruktora; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instruktorzy ALTER COLUMN id_instruktora SET DEFAULT nextval('public.instruktorzy_id_instruktora_seq'::regclass);


--
-- TOC entry 4654 (class 2604 OID 25298)
-- Name: klienci id_klienta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.klienci ALTER COLUMN id_klienta SET DEFAULT nextval('public.klienci_id_klienta_seq'::regclass);


--
-- TOC entry 4656 (class 2604 OID 25314)
-- Name: kursy id_kursu; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kursy ALTER COLUMN id_kursu SET DEFAULT nextval('public.kursy_id_kursu_seq'::regclass);


--
-- TOC entry 4657 (class 2604 OID 25326)
-- Name: transakcje id_transakcji; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transakcje ALTER COLUMN id_transakcji SET DEFAULT nextval('public.transakcje_id_transakcji_seq'::regclass);


--
-- TOC entry 4658 (class 2604 OID 25343)
-- Name: znizki id_znizki; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.znizki ALTER COLUMN id_znizki SET DEFAULT nextval('public.znizki_id_znizki_seq'::regclass);


--
-- TOC entry 4818 (class 0 OID 25304)
-- Dependencies: 218
-- Data for Name: instruktorzy; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.instruktorzy (id_instruktora, email, imie, nazwisko, jezyk, adres_zdjecia, poziom, placa) FROM stdin;
\.


--
-- TOC entry 4816 (class 0 OID 25295)
-- Dependencies: 216
-- Data for Name: klienci; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.klienci (id_klienta, email, haslo, imie, nazwisko, adres, nr_telefonu, adres_zdjecia) FROM stdin;
\.


--
-- TOC entry 4820 (class 0 OID 25311)
-- Dependencies: 220
-- Data for Name: kursy; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kursy (id_kursu, cena, jezyk, poziom, data_rozpoczecia, data_zakonczenia, liczba_miejsc, id_instruktora) FROM stdin;
\.


--
-- TOC entry 4822 (class 0 OID 25323)
-- Dependencies: 222
-- Data for Name: transakcje; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transakcje (id_transakcji, id_kursu, id_klienta, cena_ostateczna, status, data) FROM stdin;
\.


--
-- TOC entry 4824 (class 0 OID 25340)
-- Dependencies: 224
-- Data for Name: znizki; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.znizki (id_znizki, nazwa_znizki, wartosc, opis) FROM stdin;
\.


--
-- TOC entry 4835 (class 0 OID 0)
-- Dependencies: 217
-- Name: instruktorzy_id_instruktora_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.instruktorzy_id_instruktora_seq', 1, false);


--
-- TOC entry 4836 (class 0 OID 0)
-- Dependencies: 215
-- Name: klienci_id_klienta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.klienci_id_klienta_seq', 1, false);


--
-- TOC entry 4837 (class 0 OID 0)
-- Dependencies: 219
-- Name: kursy_id_kursu_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kursy_id_kursu_seq', 1, false);


--
-- TOC entry 4838 (class 0 OID 0)
-- Dependencies: 221
-- Name: transakcje_id_transakcji_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.transakcje_id_transakcji_seq', 1, false);


--
-- TOC entry 4839 (class 0 OID 0)
-- Dependencies: 223
-- Name: znizki_id_znizki_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.znizki_id_znizki_seq', 1, false);


--
-- TOC entry 4662 (class 2606 OID 25309)
-- Name: instruktorzy instruktorzy_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instruktorzy
    ADD CONSTRAINT instruktorzy_pkey PRIMARY KEY (id_instruktora);


--
-- TOC entry 4660 (class 2606 OID 25302)
-- Name: klienci klienci_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.klienci
    ADD CONSTRAINT klienci_pkey PRIMARY KEY (id_klienta);


--
-- TOC entry 4664 (class 2606 OID 25316)
-- Name: kursy kursy_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kursy
    ADD CONSTRAINT kursy_pkey PRIMARY KEY (id_kursu);


--
-- TOC entry 4666 (class 2606 OID 25328)
-- Name: transakcje transakcje_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transakcje
    ADD CONSTRAINT transakcje_pkey PRIMARY KEY (id_transakcji);


--
-- TOC entry 4668 (class 2606 OID 25347)
-- Name: znizki znizki_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.znizki
    ADD CONSTRAINT znizki_pkey PRIMARY KEY (id_znizki);


--
-- TOC entry 4669 (class 2606 OID 25317)
-- Name: kursy kursy_id_instruktora_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kursy
    ADD CONSTRAINT kursy_id_instruktora_fkey FOREIGN KEY (id_instruktora) REFERENCES public.instruktorzy(id_instruktora);


--
-- TOC entry 4670 (class 2606 OID 25334)
-- Name: transakcje transakcje_id_klienta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transakcje
    ADD CONSTRAINT transakcje_id_klienta_fkey FOREIGN KEY (id_klienta) REFERENCES public.klienci(id_klienta);


--
-- TOC entry 4671 (class 2606 OID 25329)
-- Name: transakcje transakcje_id_kursu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transakcje
    ADD CONSTRAINT transakcje_id_kursu_fkey FOREIGN KEY (id_kursu) REFERENCES public.kursy(id_kursu);


-- Completed on 2025-05-08 22:08:12

--
-- PostgreSQL database dump complete
--

