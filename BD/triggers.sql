delimiter $$
create trigger calculoCuposDisponiblesInsert
after insert on per_ubi
for each row begin

	update ubicacion
	set ubicacion.cupos_disponibles = ubicacion.limite_cupos - (
		select count(ubicacion.idubicacion)
		from per_ubi
		where ubicacion.idubicacion = per_ubi.ubicacion_idubicacion
		and ubicacion.idubicacion = NEW.ubicacion_idubicacion
	)
	where ubicacion.idubicacion = NEW.ubicacion_idubicacion;
end


delimiter $$
create trigger calculoCuposDisponiblesDelete
after delete on per_ubi
for each row begin

	update ubicacion
	set ubicacion.cupos_disponibles = ubicacion.limite_cupos - (
		select count(ubicacion.idubicacion)
		from per_ubi
		where ubicacion.idubicacion = per_ubi.ubicacion_idubicacion
		and ubicacion.idubicacion = OLD.ubicacion_idubicacion
	)
	where ubicacion.idubicacion = OLD.ubicacion_idubicacion;
end




#Seleccionar el numero de personas que pertenecen a la ubicacion 6
#select count(ubicacion.idubicacion)
#from per_ubi
#where ubicacion.idubicacion = per_ubi.ubicacion_idubicacion
#and ubicacion.idubicacion = 6