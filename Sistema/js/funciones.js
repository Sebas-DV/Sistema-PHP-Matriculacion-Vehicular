function cargarDatos(datos)
{
  valores = datos.split('||');

  $('#id_user').val(valores[0]);
  $('#nombre').val(valores[1]);
  $('#apellido').val(valores[2]);
  $('#telefono').val(valores[3]);
  $('#direccion').val(valores[4]);
}

function actualizarDatos()
{
  id = $('#id_user').val();
  nombres = $('#nombre').val();
  apellidos = $('#apellido').val();
  telefono = $('#telefono').val();
  direccion = $('#direccion').val();

  datosCadena = "id=" + id +
                "&nombres=" + nombres +
                "&apellidos=" + apellidos +
                "&telefono=" + telefono +
                "&direccion=" + direccion;

  $.ajax({
    type:"POST",
    url:"../procesos/usuarios/UsuariosACT.php",
    data: datosCadena,
    success:function(r){
      if(r==1)
      {
        alertify.success("Se actualizo con exito");
      }
      else {
        alertify.error("Error no se actualizo");
      }
    }
  });
}

function DeleteMessage(id)
{
  alertify.confirm('Eliminar Datos', '¿ Desea eliminar el registro seleccionado ?',
  function(){
    DeleteUser(id)
  }
  ,function(){
    alertify.error("Se cancelo la operacion")
  });
}

function DeleteUser (id)
{
  datosCadena = "id=" + id;
  $.ajax({
    type:"POST",
    url:"../procesos/usuarios/UsuariosDEL.php",
    data: datosCadena,
    success:function(r){

      if(r==1)
      {
        alertify.success("Se elimino el registro.");
      }
      else {
        alertify.error("Error al eliminar.");
      }
    }
  });
}

///////////////////
//Parte Vehiculos//
///////////////////

function cargarDatosVehiculo(datos)
{
  valores = datos.split('||');

  $('#id_vehiculo').val(valores[0]);
  $('#descripcion').val(valores[1]);
  $('#marca').val(valores[2]);
  $('#matricula').val(valores[3]);
}

function ActualizarVehiculo()
{
  idVehiculo = $('#id_vehiculo').val();
  idCliente = $('#id_usuario').val();
  des = $('#descripcion').val();
  marca = $('#marca').val();
  matricula = $('#matricula').val();

  datosCadena = "idVehiculo=" + idVehiculo +
                "&idCliente=" + idCliente +
                "&des=" + des +
                "&marca=" + marca +
                "&matricula=" + matricula;

  $.ajax({
    type:"POST",
    url:"../procesos/vehiculos/VehiculosACT.php",
    data: datosCadena,
    success:function(r){
      if(r==1)
      {
        alertify.success("Se actualizo con exito");
      }
      else {
        alertify.error("Error no se actualizo");
      }
    }
  });
}

function DeleteMessageV(id)
{
  alertify.confirm('Eliminar Datos', '¿ Desea eliminar el registro seleccionado ?',
  function(){
    DeleteVehiculo(id)
  }
  ,function(){
    alertify.error("Se cancelo la operacion")
  });
}

function DeleteVehiculo (id)
{
  datosCadena = "id=" + id;
  $.ajax({
    type:"POST",
    url:"../procesos/vehiculos/VehiculosDEL.php",
    data: datosCadena,
    success:function(r){

      if(r==1)
      {
        alertify.success("Se elimino el registro.");
      }
      else {
        alertify.error("Error al eliminar.");
      }
    }
  });
}
