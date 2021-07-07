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

drop table tbl_taller;
create table tbl_taller
(
	taller_id int not null auto_increment primary key,
	taller_nombre varchar(200) not null,
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


