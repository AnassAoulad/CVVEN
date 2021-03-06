PGDMP      1    "                x           Auberge    10.12    10.12 /    )           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            *           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            +           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            ,           1262    16394    Auberge    DATABASE     �   CREATE DATABASE "Auberge" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'French_France.1252' LC_CTYPE = 'French_France.1252';
    DROP DATABASE "Auberge";
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            -           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            .           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16636    administrateur    TABLE     �   CREATE TABLE public.administrateur (
    idadmin integer NOT NULL,
    mdp_connexion character varying(255),
    id_connexion character varying(255)
);
 "   DROP TABLE public.administrateur;
       public         postgres    false    3            �            1259    16644    administrateur_idadmin_seq    SEQUENCE     �   ALTER TABLE public.administrateur ALTER COLUMN idadmin ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.administrateur_idadmin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public       postgres    false    205    3            �            1259    16591    client    TABLE     /  CREATE TABLE public.client (
    idclient integer NOT NULL,
    nom_client character varying(30),
    prenom_client character varying(30),
    adresse_client character varying(300),
    tel_client character varying(20),
    id_connexion character varying(24),
    mdp_connexion character varying(30)
);
    DROP TABLE public.client;
       public         postgres    false    3            �            1259    16589    client_idclient_seq    SEQUENCE     �   CREATE SEQUENCE public.client_idclient_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.client_idclient_seq;
       public       postgres    false    3    197            /           0    0    client_idclient_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.client_idclient_seq OWNED BY public.client.idclient;
            public       postgres    false    196            �            1259    16599    logement    TABLE     �   CREATE TABLE public.logement (
    "id_Logement" integer NOT NULL,
    num_immeuble integer,
    etage integer,
    "id_TypeLogement" integer
);
    DROP TABLE public.logement;
       public         postgres    false    3            �            1259    16597    logement_id_Logement_seq    SEQUENCE     �   CREATE SEQUENCE public."logement_id_Logement_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."logement_id_Logement_seq";
       public       postgres    false    199    3            0           0    0    logement_id_Logement_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public."logement_id_Logement_seq" OWNED BY public.logement."id_Logement";
            public       postgres    false    198            �            1259    16607    reservation    TABLE     �  CREATE TABLE public.reservation (
    idreserv integer NOT NULL,
    datereservation date,
    datevacances character varying(30) NOT NULL,
    nbpersonnes integer,
    menagereservation boolean,
    typepension character varying(30),
    prixreserv double precision,
    etatreserv character varying(30),
    idclient integer,
    "id_TypeLogement" integer,
    "id_Logement" integer
);
    DROP TABLE public.reservation;
       public         postgres    false    3            �            1259    16605    reservation_idreserv_seq    SEQUENCE     �   CREATE SEQUENCE public.reservation_idreserv_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.reservation_idreserv_seq;
       public       postgres    false    201    3            1           0    0    reservation_idreserv_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.reservation_idreserv_seq OWNED BY public.reservation.idreserv;
            public       postgres    false    200            �            1259    16646    test    TABLE     �  CREATE TABLE public.test (
    idreserv integer DEFAULT nextval('public.reservation_idreserv_seq'::regclass) NOT NULL,
    datereservation date,
    datevacances character varying(30) NOT NULL,
    nbpersonnes integer,
    menagereservation boolean,
    typepension character varying(30),
    prixreserv double precision,
    etatreserv character varying(30),
    idclient integer,
    "id_TypeLogement" integer,
    "id_Logement" integer
);
    DROP TABLE public.test;
       public         postgres    false    200    3            �            1259    16615    typelogement    TABLE     �   CREATE TABLE public.typelogement (
    "id_TypeLogement" integer NOT NULL,
    nb_litdouble integer,
    nb_litsimple integer,
    description_logement character varying(200),
    tarif_logement double precision
);
     DROP TABLE public.typelogement;
       public         postgres    false    3            �            1259    16613     typelogement_id_TypeLogement_seq    SEQUENCE     �   CREATE SEQUENCE public."typelogement_id_TypeLogement_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public."typelogement_id_TypeLogement_seq";
       public       postgres    false    203    3            2           0    0     typelogement_id_TypeLogement_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public."typelogement_id_TypeLogement_seq" OWNED BY public.typelogement."id_TypeLogement";
            public       postgres    false    202            �            1259    16632    verificationreservation    TABLE     �  CREATE TABLE public.verificationreservation (
    idreserv integer DEFAULT nextval('public.reservation_idreserv_seq'::regclass) NOT NULL,
    datereservation date,
    datevacances character varying(30) NOT NULL,
    nbpersonnes integer,
    menagereservation boolean,
    typepension character varying(30),
    prixreserv double precision,
    etatreserv character varying(30),
    idclient integer,
    "id_TypeLogement" integer,
    "id_Logement" integer
);
 +   DROP TABLE public.verificationreservation;
       public         postgres    false    200    3            �
           2604    16594    client idclient    DEFAULT     r   ALTER TABLE ONLY public.client ALTER COLUMN idclient SET DEFAULT nextval('public.client_idclient_seq'::regclass);
 >   ALTER TABLE public.client ALTER COLUMN idclient DROP DEFAULT;
       public       postgres    false    197    196    197            �
           2604    16602    logement id_Logement    DEFAULT     �   ALTER TABLE ONLY public.logement ALTER COLUMN "id_Logement" SET DEFAULT nextval('public."logement_id_Logement_seq"'::regclass);
 E   ALTER TABLE public.logement ALTER COLUMN "id_Logement" DROP DEFAULT;
       public       postgres    false    198    199    199            �
           2604    16610    reservation idreserv    DEFAULT     |   ALTER TABLE ONLY public.reservation ALTER COLUMN idreserv SET DEFAULT nextval('public.reservation_idreserv_seq'::regclass);
 C   ALTER TABLE public.reservation ALTER COLUMN idreserv DROP DEFAULT;
       public       postgres    false    200    201    201            �
           2604    16618    typelogement id_TypeLogement    DEFAULT     �   ALTER TABLE ONLY public.typelogement ALTER COLUMN "id_TypeLogement" SET DEFAULT nextval('public."typelogement_id_TypeLogement_seq"'::regclass);
 M   ALTER TABLE public.typelogement ALTER COLUMN "id_TypeLogement" DROP DEFAULT;
       public       postgres    false    203    202    203            $          0    16636    administrateur 
   TABLE DATA               N   COPY public.administrateur (idadmin, mdp_connexion, id_connexion) FROM stdin;
    public       postgres    false    205   �7                 0    16591    client 
   TABLE DATA               ~   COPY public.client (idclient, nom_client, prenom_client, adresse_client, tel_client, id_connexion, mdp_connexion) FROM stdin;
    public       postgres    false    197   �7                 0    16599    logement 
   TABLE DATA               Y   COPY public.logement ("id_Logement", num_immeuble, etage, "id_TypeLogement") FROM stdin;
    public       postgres    false    199   y8                  0    16607    reservation 
   TABLE DATA               �   COPY public.reservation (idreserv, datereservation, datevacances, nbpersonnes, menagereservation, typepension, prixreserv, etatreserv, idclient, "id_TypeLogement", "id_Logement") FROM stdin;
    public       postgres    false    201   �8       &          0    16646    test 
   TABLE DATA               �   COPY public.test (idreserv, datereservation, datevacances, nbpersonnes, menagereservation, typepension, prixreserv, etatreserv, idclient, "id_TypeLogement", "id_Logement") FROM stdin;
    public       postgres    false    207   9       "          0    16615    typelogement 
   TABLE DATA               {   COPY public.typelogement ("id_TypeLogement", nb_litdouble, nb_litsimple, description_logement, tarif_logement) FROM stdin;
    public       postgres    false    203   "9       #          0    16632    verificationreservation 
   TABLE DATA               �   COPY public.verificationreservation (idreserv, datereservation, datevacances, nbpersonnes, menagereservation, typepension, prixreserv, etatreserv, idclient, "id_TypeLogement", "id_Logement") FROM stdin;
    public       postgres    false    204   ?9       3           0    0    administrateur_idadmin_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.administrateur_idadmin_seq', 2, true);
            public       postgres    false    206            4           0    0    client_idclient_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.client_idclient_seq', 10, true);
            public       postgres    false    196            5           0    0    logement_id_Logement_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."logement_id_Logement_seq"', 1, false);
            public       postgres    false    198            6           0    0    reservation_idreserv_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.reservation_idreserv_seq', 266, true);
            public       postgres    false    200            7           0    0     typelogement_id_TypeLogement_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public."typelogement_id_TypeLogement_seq"', 1, false);
            public       postgres    false    202            �
           2606    16640 "   administrateur administrateur_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.administrateur
    ADD CONSTRAINT administrateur_pkey PRIMARY KEY (idadmin);
 L   ALTER TABLE ONLY public.administrateur DROP CONSTRAINT administrateur_pkey;
       public         postgres    false    205            �
           2606    16596    client client_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (idclient);
 <   ALTER TABLE ONLY public.client DROP CONSTRAINT client_pkey;
       public         postgres    false    197            �
           2606    16604    logement logement_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.logement
    ADD CONSTRAINT logement_pkey PRIMARY KEY ("id_Logement");
 @   ALTER TABLE ONLY public.logement DROP CONSTRAINT logement_pkey;
       public         postgres    false    199            �
           2606    16612    reservation reservation_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.reservation
    ADD CONSTRAINT reservation_pkey PRIMARY KEY (idreserv);
 F   ALTER TABLE ONLY public.reservation DROP CONSTRAINT reservation_pkey;
       public         postgres    false    201            �
           2606    16660    test test_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.test
    ADD CONSTRAINT test_pkey PRIMARY KEY (idreserv);
 8   ALTER TABLE ONLY public.test DROP CONSTRAINT test_pkey;
       public         postgres    false    207            �
           2606    16620    typelogement typelogement_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.typelogement
    ADD CONSTRAINT typelogement_pkey PRIMARY KEY ("id_TypeLogement");
 H   ALTER TABLE ONLY public.typelogement DROP CONSTRAINT typelogement_pkey;
       public         postgres    false    203            �           826    16631    DEFAULT PRIVILEGES FOR TABLES    DEFAULT ACL     P   ALTER DEFAULT PRIVILEGES FOR ROLE postgres REVOKE ALL ON TABLES  FROM postgres;
                  postgres    false            $   2   x3�,I-.\F��)��y2���(�$���!=713G/9?�+F��� �p         �   x�OI
�0<K�	���և��V���J }}'��܃f$f4H-p`b��v���#�G{<���y�[�^����3�RU�V�j��$z�%���.^ә2m��_�	K���?ǰ�R@t�] �v�$�G���p/��<�f            x����� � �          _   x323�4202�50�52�42�7���9�9�8]Rs3uR�3��8c�8�R�S��R9A�?.#3Sd톖 �`C�F��XaL� �  �      &      x����� � �      "      x����� � �      #      x����� � �     