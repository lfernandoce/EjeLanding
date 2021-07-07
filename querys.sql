-- POR INTEGRAR
-- 1. Verificar si existe directorio y crearlo
-- 2. nuevos sp para separar operaciones
-- 3. configuracion de rutas desde archivo config


use db_examen;
-- drop table tbl_cat_estados
create table tbl_cat_estados
(
	estado_id int not null auto_increment primary key,
    estado_descripcion varchar(100),
    estado_fecha datetime
);

insert into tbl_cat_estados(estado_descripcion,estado_fecha)	values ('Activo',now());
insert into tbl_cat_estados(estado_descripcion,estado_fecha)	values ('Inactivo',now());
insert into tbl_cat_estados(estado_descripcion,estado_fecha)	values ('Suspendido',now());

DELIMITER $$
create procedure psp_estados
(
	i_operacion int,
    i_id_estado int
)
begin
	if i_operacion = 1 then    
		select * from tbl_cat_estados;
    end if;
    
    if i_operacion = 2 then    
		select * from tbl_cat_estados where estado_id = i_id_estado;
    end if;
end$$
-- todos
call psp_estados(1,null);
-- uno solo
call psp_estados(2,1);
select * from tbl_cat_estados;


-- ------------------------------------------------------------------------------
-- Generar Nombre Aleatorio
-- -------------------------------------------------------------------------------

-- -------------------------------------------------------------------------------
-- Tipo de taller
-- -------------------------------------------------------------------------------
create table tbl_tipo_taller
(
	id_tipo int not null auto_increment primary key
    ,tipo_descripcion varchar(100)
);

insert into tbl_tipo_taller (tipo_descripcion) values('TIPO 1');
insert into tbl_tipo_taller (tipo_descripcion) values('TIPO 2');

SELECT  * from tbl_tipo_taller;
select * from tbl_taller
DELIMITER $$
create procedure psp_tipo_taller
(
	i_operacion int
    ,i_id_tipo int
)
begin
	if i_operacion = 1 then
		select * from tbl_tipo_taller;
    end if;
    
    if i_operacion = 2 then
		select * from tbl_tipo_taller
        where id_tipo = i_id_tipo;
    end if;    
end$$

select * from tbl_taller;
call psp_tipo_taller(1,null);
call psp_tipo_taller(2,1);


 

drop table tbl_taller;
create table tbl_taller
(
	taller_id int not null auto_increment primary key,
	taller_nombre varchar(200) not null,
    taller_tipo int,
    taller_mensaje varchar(500),
    taller_link_acceso varchar(500),
    taller_codigo_acceso varchar(25),
    taller_imagen varchar(500),
    estado int default 0,    
    user_ing varchar(25),
    fecha_ing datetime,
    user_mod varchar(25),
    fecha_mod datetime    
);


DELIMITER $$
create procedure psp_gen_taller
(
		i_operacion int,    
		-- parametros para insertar datos de taller
		i_taller_nombre 			varchar(200),
        i_taller_tipo 				int,
		i_taller_mensaje 			varchar(500),
		i_taller_link_acceso 		varchar(500),
		i_taller_codigo_acceso 		varchar(25),  
        i_taller_imagen 			varchar(500),
		i_user_ing 					varchar(25)
)
BEGIN
    -- ==========================================================
    -- Operacion para insertar registros en tabla tbl_taller
    -- ==========================================================
   	if i_operacion = 1 then 
		INSERT INTO db_examen.tbl_taller(taller_nombre  ,taller_tipo     ,taller_mensaje  ,taller_link_acceso  ,taller_codigo_acceso  ,taller_imagen  ,estado,user_ing,fecha_ing)
								  values(i_taller_nombre,i_taller_tipo   ,i_taller_mensaje,i_taller_link_acceso,i_taller_codigo_acceso,i_taller_imagen,1     ,i_user_ing,NOW());
    end if;
END$$;

-- truncate table tbl_taller
call psp_gen_taller
(
		1 										-- i_operacion int,    		
		,'Metodo Estrellita2'					-- i_taller_nombre 			varchar(200),
        ,1							-- i_taller_tipo 				int,
		,'Bienvenido al metodo de estrellita'	-- i_taller_mensaje 			varchar(500),
		,'https://zoom.com'						-- i_taller_link_acceso 		varchar(500),
		,'a4545s12'								-- i_taller_codigo_acceso 		varchar(25),  
        ,'imagen.png'							-- i_taller_imagen 			varchar(500),
		,'Test'									-- i_user_ing 					varchar(25)
);


-- =============================================================
-- Actualizar taller
-- =============================================================
-- drop procedure psp_taller_upd
DELIMITER $$
create procedure psp_taller_upd
(
		i_operacion int,    
		-- parametros para insertar datos de taller
		i_taller_nombre 			varchar(200),
        i_taller_tipo 				int,
		i_taller_mensaje 			varchar(500),
		i_taller_link_acceso 		varchar(500),
		i_taller_codigo_acceso 		varchar(25),    
        i_taller_imagen				varchar(500),
		-- parametros actualizar
		i_taller_id					int,
		i_user_mod 					varchar(25),
		i_estado 					int
)
BEGIN
	-- ==========================================================
    -- Operacion para modificar registros en tabla tbl_taller
    -- ==========================================================
	if i_operacion = 1 then
		update db_examen.tbl_taller 
			set taller_nombre		=i_taller_nombre            
            ,taller_tipo			=i_taller_tipo
            ,taller_mensaje			=i_taller_mensaje
            ,taller_link_acceso		=i_taller_link_acceso
            ,taller_codigo_acceso	=i_taller_codigo_acceso
            ,taller_imagen			=i_taller_imagen
            ,estado					=i_estado
            ,user_mod				=i_user_mod
            ,fecha_mod				=now()            
        where taller_id=i_taller_id;
    end if;
END$$;

call psp_taller_upd
(
		1								-- i_operacion int    		
		,'Metodo estrellita'			-- i_taller_nombre 			varchar(200),
        ,2 								-- i_taller_tipo 				int,
		,'Bienvenido'					-- i_taller_mensaje 			varchar(500),
		,'https://youtube.com'			-- i_taller_link_acceso 		varchar(500),
		,'12345'						-- i_taller_codigo_acceso 		varchar(25),    
        ,'imagen1.jpg'					-- i_taller_imagen				varchar(500),				
		,1								-- i_taller_id					int,
		,'Testupd'						-- i_user_mod 					varchar(25),
		,2 								-- i_estado 					int
)

call psp_taller_upd(?,?,?,?,?,?,?,?,?,?)


'1', 'Metodo estrellita', '1', 'Bienvenido', 'https://youtube.com', '12345', 'C:IMG_SITESUploadsIM_8932f1780d-89614-regi.png', '2', 'Test', '2021-06-16 22:17:44', 'test', '2021-06-26 18:45:03'

SELECT * FROM tbl_taller;
taller_imagen

select * from db_examen.tbl_taller;


select * from tbl_taller

drop procedure psp_talleres;
DELIMITER $$
create procedure psp_talleres
(
		i_operacion int,    
		-- parametros para insertar datos de taller
		i_taller_nombre 			varchar(200),
		i_taller_mensaje 			varchar(500),
		i_taller_link_acceso 		varchar(500),
		i_taller_codigo_acceso 		varchar(25),    
		i_user_ing 					varchar(25),    
		-- parametros actualizar
		i_taller_id					int,
		i_user_mod 					varchar(25),
		i_estado 					int
)
BEGIN
	-- ==========================================================
	-- listado de todos los registros en la tabla tbl_taller
    -- ==========================================================
    if i_operacion =1 then    
		select * from tbl_taller;
    end if;
    
    -- ==========================================================
    -- Operacion para insertar registros en tabla tbl_taller
    -- ==========================================================
   	if i_operacion =2 then 
		INSERT INTO db_examen.tbl_taller(taller_nombre,taller_mensaje,taller_link_acceso,taller_codigo_acceso,estado,user_ing,fecha_ing)
								  values(i_taller_nombre,i_taller_mensaje,i_taller_link_acceso,i_taller_codigo_acceso,0     ,i_user_ing,NOW());
    end if;
    
    -- ==========================================================
    -- Operacion para modificar registros en tabla tbl_taller
    -- ==========================================================
	if i_operacion = 3 then
		update db_examen.tbl_taller 
			set taller_nombre		=i_taller_nombre            
            ,taller_mensaje			=i_taller_mensaje
            ,taller_link_acceso		=i_taller_link_acceso
            ,taller_codigo_acceso	=i_taller_codigo_acceso
            ,estado					=i_estado
            ,user_mod				=i_user_mod
            ,fecha_mod				=now()            
        where taller_id=i_taller_id;
    end if;
END$$
CALL psp_talleres (2
					,'Metodo estrella'
                    ,'Bienvenidos al taller metodo estrellita'
                    ,'https://zoom.com.gt/dkfjasdkljfas'
                    ,'4545d51'
                    ,'Test'
                    ,null
                    ,null
);
CALL psp_talleres (3
					,'Metodo estrella3'
                    ,'Bienvenidos al taller metodo estrellita3'
                    ,'https://zoom.com.gt/dkfjasdkljfas'
                    ,'4545d512'
                    ,null
                    ,3 -- taller id
                    ,'Test' 
                    ,2
);
CALL psp_talleres (1,null,null,null,null,null,null,null,null)



select * from tbl_taller;


