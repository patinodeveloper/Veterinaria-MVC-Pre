PGDMP      0                |            veterinaria_db1    16.2    16.2 U               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16527    veterinaria_db1    DATABASE     �   CREATE DATABASE veterinaria_db1 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE veterinaria_db1;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                pg_database_owner    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   pg_database_owner    false    4            �            1259    16563    citas    TABLE     �   CREATE TABLE public.citas (
    id integer NOT NULL,
    id_paciente integer,
    fecha date NOT NULL,
    hora time without time zone NOT NULL,
    id_servicio integer,
    observaciones character varying(255)
);
    DROP TABLE public.citas;
       public         heap    postgres    false    4            �            1259    16562    citas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.citas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.citas_id_seq;
       public          postgres    false    4    222                       0    0    citas_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.citas_id_seq OWNED BY public.citas.id;
          public          postgres    false    221            �            1259    16605    compras    TABLE     �   CREATE TABLE public.compras (
    id integer NOT NULL,
    id_proveedor integer,
    id_producto integer,
    cantidad integer NOT NULL,
    fecha date NOT NULL,
    total numeric(10,2) NOT NULL
);
    DROP TABLE public.compras;
       public         heap    postgres    false    4            �            1259    16604    compras_id_seq    SEQUENCE     �   CREATE SEQUENCE public.compras_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.compras_id_seq;
       public          postgres    false    230    4                       0    0    compras_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.compras_id_seq OWNED BY public.compras.id;
          public          postgres    false    229            �            1259    16659 	   empleados    TABLE     4  CREATE TABLE public.empleados (
    id integer NOT NULL,
    nombre character varying(255),
    cargo character varying(100),
    telefono character varying(20),
    direccion text,
    email character varying(100),
    edad integer,
    sexo character varying(10),
    estado_civil character varying(20)
);
    DROP TABLE public.empleados;
       public         heap    postgres    false    4            �            1259    16658    empleados_id_seq    SEQUENCE     �   CREATE SEQUENCE public.empleados_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.empleados_id_seq;
       public          postgres    false    4    234                       0    0    empleados_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.empleados_id_seq OWNED BY public.empleados.id;
          public          postgres    false    233            �            1259    16577 
   inventario    TABLE     �   CREATE TABLE public.inventario (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    descripcion text,
    categoria character varying(100) NOT NULL,
    precio numeric(10,2) NOT NULL,
    cantidad integer NOT NULL
);
    DROP TABLE public.inventario;
       public         heap    postgres    false    4            �            1259    16576    inventario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.inventario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.inventario_id_seq;
       public          postgres    false    224    4                       0    0    inventario_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.inventario_id_seq OWNED BY public.inventario.id;
          public          postgres    false    223            �            1259    16556 	   pacientes    TABLE     \  CREATE TABLE public.pacientes (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    especie character varying(50) NOT NULL,
    raza character varying(50),
    edad character varying(50),
    propietario character varying(150) NOT NULL,
    telefono character varying NOT NULL,
    direccion character varying(200) NOT NULL
);
    DROP TABLE public.pacientes;
       public         heap    postgres    false    4            �            1259    16555    pacientes_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pacientes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.pacientes_id_seq;
       public          postgres    false    220    4                       0    0    pacientes_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.pacientes_id_seq OWNED BY public.pacientes.id;
          public          postgres    false    219            �            1259    16598    proveedores    TABLE     �   CREATE TABLE public.proveedores (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    contacto character varying(100),
    telefono character varying(20),
    email character varying(100)
);
    DROP TABLE public.proveedores;
       public         heap    postgres    false    4            �            1259    16597    proveedores_id_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedores_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.proveedores_id_seq;
       public          postgres    false    4    228                       0    0    proveedores_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.proveedores_id_seq OWNED BY public.proveedores.id;
          public          postgres    false    227            �            1259    16622 	   servicios    TABLE     �   CREATE TABLE public.servicios (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    descripcion text,
    costo numeric(10,2) NOT NULL
);
    DROP TABLE public.servicios;
       public         heap    postgres    false    4            �            1259    16621    servicios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.servicios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.servicios_id_seq;
       public          postgres    false    4    232                        0    0    servicios_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.servicios_id_seq OWNED BY public.servicios.id;
          public          postgres    false    231            �            1259    16529    tipos_usuario    TABLE     h   CREATE TABLE public.tipos_usuario (
    id integer NOT NULL,
    tipo character varying(20) NOT NULL
);
 !   DROP TABLE public.tipos_usuario;
       public         heap    postgres    false    4            �            1259    16528    tipos_usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tipos_usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.tipos_usuario_id_seq;
       public          postgres    false    4    216            !           0    0    tipos_usuario_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.tipos_usuario_id_seq OWNED BY public.tipos_usuario.id;
          public          postgres    false    215            �            1259    16538    usuarios    TABLE       CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nombre_usuario character varying(50) NOT NULL,
    contrasena character varying(255) NOT NULL,
    tipo_usuario_id integer NOT NULL,
    imagen_perfil character varying(255),
    empleado_id integer
);
    DROP TABLE public.usuarios;
       public         heap    postgres    false    4            �            1259    16537    usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public          postgres    false    4    218            "           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
          public          postgres    false    217            �            1259    16586    ventas    TABLE     �   CREATE TABLE public.ventas (
    id integer NOT NULL,
    id_producto integer,
    cantidad integer NOT NULL,
    fecha date NOT NULL,
    total numeric(10,2) NOT NULL
);
    DROP TABLE public.ventas;
       public         heap    postgres    false    4            �            1259    16585    ventas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.ventas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.ventas_id_seq;
       public          postgres    false    226    4            #           0    0    ventas_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.ventas_id_seq OWNED BY public.ventas.id;
          public          postgres    false    225            J           2604    16566    citas id    DEFAULT     d   ALTER TABLE ONLY public.citas ALTER COLUMN id SET DEFAULT nextval('public.citas_id_seq'::regclass);
 7   ALTER TABLE public.citas ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    222    222            N           2604    16608 
   compras id    DEFAULT     h   ALTER TABLE ONLY public.compras ALTER COLUMN id SET DEFAULT nextval('public.compras_id_seq'::regclass);
 9   ALTER TABLE public.compras ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    229    230            P           2604    16662    empleados id    DEFAULT     l   ALTER TABLE ONLY public.empleados ALTER COLUMN id SET DEFAULT nextval('public.empleados_id_seq'::regclass);
 ;   ALTER TABLE public.empleados ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    233    234    234            K           2604    16580    inventario id    DEFAULT     n   ALTER TABLE ONLY public.inventario ALTER COLUMN id SET DEFAULT nextval('public.inventario_id_seq'::regclass);
 <   ALTER TABLE public.inventario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    223    224            I           2604    16559    pacientes id    DEFAULT     l   ALTER TABLE ONLY public.pacientes ALTER COLUMN id SET DEFAULT nextval('public.pacientes_id_seq'::regclass);
 ;   ALTER TABLE public.pacientes ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    219    220            M           2604    16601    proveedores id    DEFAULT     p   ALTER TABLE ONLY public.proveedores ALTER COLUMN id SET DEFAULT nextval('public.proveedores_id_seq'::regclass);
 =   ALTER TABLE public.proveedores ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    228    228            O           2604    16625    servicios id    DEFAULT     l   ALTER TABLE ONLY public.servicios ALTER COLUMN id SET DEFAULT nextval('public.servicios_id_seq'::regclass);
 ;   ALTER TABLE public.servicios ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    232    231    232            G           2604    16532    tipos_usuario id    DEFAULT     t   ALTER TABLE ONLY public.tipos_usuario ALTER COLUMN id SET DEFAULT nextval('public.tipos_usuario_id_seq'::regclass);
 ?   ALTER TABLE public.tipos_usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            H           2604    16541    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217    218            L           2604    16589 	   ventas id    DEFAULT     f   ALTER TABLE ONLY public.ventas ALTER COLUMN id SET DEFAULT nextval('public.ventas_id_seq'::regclass);
 8   ALTER TABLE public.ventas ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    225    226                      0    16563    citas 
   TABLE DATA           Y   COPY public.citas (id, id_paciente, fecha, hora, id_servicio, observaciones) FROM stdin;
    public          postgres    false    222   �`                 0    16605    compras 
   TABLE DATA           X   COPY public.compras (id, id_proveedor, id_producto, cantidad, fecha, total) FROM stdin;
    public          postgres    false    230   �a                 0    16659 	   empleados 
   TABLE DATA           l   COPY public.empleados (id, nombre, cargo, telefono, direccion, email, edad, sexo, estado_civil) FROM stdin;
    public          postgres    false    234   �a                 0    16577 
   inventario 
   TABLE DATA           Z   COPY public.inventario (id, nombre, descripcion, categoria, precio, cantidad) FROM stdin;
    public          postgres    false    224   eb                 0    16556 	   pacientes 
   TABLE DATA           f   COPY public.pacientes (id, nombre, especie, raza, edad, propietario, telefono, direccion) FROM stdin;
    public          postgres    false    220   @e                 0    16598    proveedores 
   TABLE DATA           L   COPY public.proveedores (id, nombre, contacto, telefono, email) FROM stdin;
    public          postgres    false    228   ~j                 0    16622 	   servicios 
   TABLE DATA           C   COPY public.servicios (id, nombre, descripcion, costo) FROM stdin;
    public          postgres    false    232   �j                  0    16529    tipos_usuario 
   TABLE DATA           1   COPY public.tipos_usuario (id, tipo) FROM stdin;
    public          postgres    false    216   l                 0    16538    usuarios 
   TABLE DATA           o   COPY public.usuarios (id, nombre_usuario, contrasena, tipo_usuario_id, imagen_perfil, empleado_id) FROM stdin;
    public          postgres    false    218   Ll       
          0    16586    ventas 
   TABLE DATA           I   COPY public.ventas (id, id_producto, cantidad, fecha, total) FROM stdin;
    public          postgres    false    226   �l       $           0    0    citas_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.citas_id_seq', 9, true);
          public          postgres    false    221            %           0    0    compras_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.compras_id_seq', 1, false);
          public          postgres    false    229            &           0    0    empleados_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.empleados_id_seq', 1, true);
          public          postgres    false    233            '           0    0    inventario_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.inventario_id_seq', 16, true);
          public          postgres    false    223            (           0    0    pacientes_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.pacientes_id_seq', 59, true);
          public          postgres    false    219            )           0    0    proveedores_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.proveedores_id_seq', 1, false);
          public          postgres    false    227            *           0    0    servicios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.servicios_id_seq', 9, true);
          public          postgres    false    231            +           0    0    tipos_usuario_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.tipos_usuario_id_seq', 2, true);
          public          postgres    false    215            ,           0    0    usuarios_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.usuarios_id_seq', 3, true);
          public          postgres    false    217            -           0    0    ventas_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.ventas_id_seq', 1, false);
          public          postgres    false    225            \           2606    16570    citas citas_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.citas
    ADD CONSTRAINT citas_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.citas DROP CONSTRAINT citas_pkey;
       public            postgres    false    222            d           2606    16610    compras compras_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.compras
    ADD CONSTRAINT compras_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.compras DROP CONSTRAINT compras_pkey;
       public            postgres    false    230            h           2606    16666    empleados empleados_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.empleados
    ADD CONSTRAINT empleados_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.empleados DROP CONSTRAINT empleados_pkey;
       public            postgres    false    234            ^           2606    16584    inventario inventario_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.inventario
    ADD CONSTRAINT inventario_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.inventario DROP CONSTRAINT inventario_pkey;
       public            postgres    false    224            Z           2606    16561    pacientes pacientes_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.pacientes
    ADD CONSTRAINT pacientes_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.pacientes DROP CONSTRAINT pacientes_pkey;
       public            postgres    false    220            b           2606    16603    proveedores proveedores_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.proveedores
    ADD CONSTRAINT proveedores_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.proveedores DROP CONSTRAINT proveedores_pkey;
       public            postgres    false    228            f           2606    16629    servicios servicios_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.servicios
    ADD CONSTRAINT servicios_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.servicios DROP CONSTRAINT servicios_pkey;
       public            postgres    false    232            R           2606    16534     tipos_usuario tipos_usuario_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.tipos_usuario
    ADD CONSTRAINT tipos_usuario_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.tipos_usuario DROP CONSTRAINT tipos_usuario_pkey;
       public            postgres    false    216            T           2606    16536 $   tipos_usuario tipos_usuario_tipo_key 
   CONSTRAINT     _   ALTER TABLE ONLY public.tipos_usuario
    ADD CONSTRAINT tipos_usuario_tipo_key UNIQUE (tipo);
 N   ALTER TABLE ONLY public.tipos_usuario DROP CONSTRAINT tipos_usuario_tipo_key;
       public            postgres    false    216            V           2606    16549 $   usuarios usuarios_nombre_usuario_key 
   CONSTRAINT     i   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_nombre_usuario_key UNIQUE (nombre_usuario);
 N   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_nombre_usuario_key;
       public            postgres    false    218            X           2606    16545    usuarios usuarios_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public            postgres    false    218            `           2606    16591    ventas ventas_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.ventas DROP CONSTRAINT ventas_pkey;
       public            postgres    false    226            k           2606    16571    citas citas_id_paciente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.citas
    ADD CONSTRAINT citas_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.pacientes(id);
 F   ALTER TABLE ONLY public.citas DROP CONSTRAINT citas_id_paciente_fkey;
       public          postgres    false    220    222    4698            l           2606    24581    citas citas_id_servicio_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.citas
    ADD CONSTRAINT citas_id_servicio_fkey FOREIGN KEY (id_servicio) REFERENCES public.servicios(id);
 F   ALTER TABLE ONLY public.citas DROP CONSTRAINT citas_id_servicio_fkey;
       public          postgres    false    232    4710    222            n           2606    16616     compras compras_id_producto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.compras
    ADD CONSTRAINT compras_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES public.inventario(id);
 J   ALTER TABLE ONLY public.compras DROP CONSTRAINT compras_id_producto_fkey;
       public          postgres    false    4702    224    230            o           2606    16611 !   compras compras_id_proveedor_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.compras
    ADD CONSTRAINT compras_id_proveedor_fkey FOREIGN KEY (id_proveedor) REFERENCES public.proveedores(id);
 K   ALTER TABLE ONLY public.compras DROP CONSTRAINT compras_id_proveedor_fkey;
       public          postgres    false    4706    228    230            i           2606    16668    usuarios fk_empleado_id    FK CONSTRAINT     ~   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT fk_empleado_id FOREIGN KEY (empleado_id) REFERENCES public.empleados(id);
 A   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT fk_empleado_id;
       public          postgres    false    234    4712    218            j           2606    16550 &   usuarios usuarios_tipo_usuario_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_tipo_usuario_id_fkey FOREIGN KEY (tipo_usuario_id) REFERENCES public.tipos_usuario(id);
 P   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_tipo_usuario_id_fkey;
       public          postgres    false    4690    218    216            m           2606    16592    ventas ventas_id_producto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES public.inventario(id);
 H   ALTER TABLE ONLY public.ventas DROP CONSTRAINT ventas_id_producto_fkey;
       public          postgres    false    226    4702    224               �   x�U�Mn!F������df��ˮ�q	Q񣴽SW=B.VM�������&�#��.g�j� �r�Fz2Ԥl�u����x�bD�`D������;/�٤�X���Vc x�p�]����@_��خ�8>�Bݰ�\.dJ�����uXM64D�~R�������>N��i�zzڢq8���w5�,Ş��9tZ&P�KU�w�T}�-�>W�!��f��!�n�k_            x������ � �         �   x�=ͱ
�0�������f� ���r�PҜ���o����3���o��qyc'��x�I��⑃8a���'��Da[Z��ea+�����lO������F�����Ӱ|���LG�ݾX9`c����!�h�/572�� i�2)         �  x�}T�r�0�����r�b'������k;vA(T����|I�&c��n]�b)Q�����d� >|����R�8� �^�೥�sxF#�_��Gނs�A��wB��NZϪ�j�g۲�)\�������Q��Z�z�SR�	�Uۘ�*�������
�dBߡ���wh�)�4�a�COɉ��l%d��͞]�ņ���rm]��͍�s�%;��A��.�\�RP^��K�n#�MYl�O�����'��|h��W8����\uId��eq��'�����d�/m��G�*q����1��������Ι�_5=���� ����6�����|}��o�{���rƣ�R���JchBs�=��CE���XjڡW�I�{8��jt�0�ʣ�r�᧒_����	R�����*�G�뚷�d ж(��{P}�����2��1�%y�kG�+v�N*e#����.�w#=ϳ ���=2T|��_Q����P����*۟m�5I-��o=�.����/��=�	�z��"W׳�$Aw@�8�e��F�����Ha���$z&]G�&���t�2�1�E��m\��j3��E"�l��%���M��pμ��]mc
�/���Tt	�O�t�{�L��]����I{�Ŀ���)�׆�6�Q9��Rju=^ʢ�a�h�}g]�#�<�_O�Y�S4܀��N�r">�/k��Vu���(�?޿)_         .  x��VMo7=s�����і�����E/#-�%L�.w׎�oz�!�"?A��+r%�I
�c@���y3�8	;7���(�5�֖cYʖd%��I���"��$fgwBˆx�Q��t+�vp>��=�JaY�i���ؙ��^�,��Y\q����� ���d-m��R�Qɮ�������lY�.��+����� Y�jeTT��ܭ�]P?�%le>��_HzdY8@��௻�
�(�قd�~4�Q��l!���7�j����La�$��[Jea�$��sc4���`��R���؎�8fs�	$�[��?�F	z���M�2�)rY�Q��k�
��W�����;��_�N��U8l�  �!�S�z�zA��kݰ��FJ�1��@�au8z�?g��C�� �_?�b��
8_���[A�x�9��{+�T� ���^v-_���-I��SO
����X�z;�_⢒-�RS�ڢv)����i���[�Qûb��;�	/}�!f+c�r�;ro�đQ�W�f�`l��K
�L7V��oD��Q2c����u�� PԈ�����`�����͍�rw�_���\Cm��q��8Cq�- �I	1!�i��4ce��R���WGF�z���
���p�1�X�7F5`�Lw�I�̓HQ��fW�s�E����L���oF�����ۭ�Ͻ�	�Hg�8?o�=@��ZBt.��vη�&�H�D�۩�����K�C��q2��ۉ>�u-����9���p�D(۵8vT��W�cD�R�sZ����L3��~¤ݑ6������d�F#�y�rGb�D��P�{!��M`��=�da0�r�;.��Fy
΅ޒB����S)]B;��'���b~���C�;� B��ȇ*���ޢ�7Hi�-uT��Mh��Y�֋�OsoS�\e3@�m�gz%�-���tQh������	ztN�5d{�Q�H�H�	l}깴�v�0D�whEw�5�c����+o���F<�*���5#T��v��܃�*3eO;�	t�zaN��f�|��Q�ju��v�n�)��z���g�W�X����zk,M]~=�M��8+�{��ϩ��-D�1�lp��ƈO-J�`����)?���EY����|���'nup��";1���oM����\˭�ۼ�m^�ד�+�:b��{���U��h�Ɇ/M��  sϒ:���-�-𫭉b\����V&~\��N��	�6�$h^�Fت�-��oϒT����U�w�ʧI��g'�g���r�d]�ϋk7���g�Հ��-.h������(���l�.            x������ � �         k  x����n1�g�yD��vl��CU�N]�Ĝ,]�����0v�P��bMrGӝc��߹��wa�FToIء0��-9�M߁�W{e�~C,!;֌��PPY�G0��'���P�jN����!J+C꣦C��	}�cQ�$�
0���,�&}ci[�����@��U�gEu$�C��`�n&U�-�(���q@l#Z&�@i�J���0c�e��<��aZ�sx��S�Yz�TD�P�S�]��7;](y4˨p�������o��u���^Ѱo��6�V�ئcC.ϕ>��[�'�/�jӗ�_������V˫�U�<���V�Yl�E�&��F�����gK0�!���GUż�G��{(��          &   x�3�tL����,.)JL�/�2�t�-�I��b���� ��	�         Y   x�}�M
� ��7�Qg��Kt!C����?E`˶�'8r;*C���)G=}g�J��h����]�.Ç�
z�<�k�����LN�{�'�      
      x������ � �     