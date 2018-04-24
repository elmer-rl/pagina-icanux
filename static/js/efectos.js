  var urlweb=document.getElementsByTagName("base")[0].href


  function subir(){

 var formData = new FormData($("#formAvatar")[0]);
  $.ajax({
  type: 'POST',
  url: urlweb + 'inc/subida.php',
  data: formData,
  contentType: false,
  processData: false,
  success: function(respuesta){
    //Refrescar imagen
   
    $('#formAvatar')[0].reset();
    $('#imgenavatar').attr('src', respuesta);

      
  }
  });

 }
function comentar_ajax(mensaje){
  
    if(mensaje.trim()==''){
      //error
    $('#comentar-error').fadeIn(500);
      $('#comentar-mensaje').text('Completa el comentario');
    }
    else {
      $.ajax({
      type: 'POST',
      url: urlweb + 'inc/addcoment.php',
      data: 'mensaje=' + mensaje, 
      success: function(respuesta){

        if(respuesta.trim()!='error'){
          $('#comentarios').append(respuesta);
          location.reload();
        }
              
      }
      });
    }
    
    

}


function subir_img_tiemporeal(valor){
  if(valor==1){
    $('#imagenupload').click();
  }
  else if(valor==2){
    var formData = new FormData($("#formTiemporeal")[0]);
    $.ajax({
    type: 'POST',
    url: urlweb + 'inc/tiemporeal.php',
    data: formData,
    contentType: false,
    processData: false,
    success: function(respuesta){
      //Refrescar imagen
      $('#formTiemporeal')[0].reset();
      $('#imagentiemporeal').append(respuesta);
    }
    });
  }
  
}



function validar_form(enlace,titulo,email,descripcion,porpagina){

  if(enlace.trim()!='' && titulo.trim()!='' && email.trim()!='' && descripcion.trim()!='' && porpagina.trim()!=''){
    //ok
    return true;
  } else {
    $('#datosweb-error').fadeIn(500);
    $('#datosweb-mensaje').fadeIn(500);
      $('#datosweb-mensaje').text('Completa los campos');
    return false;
  }

}


function editar_user(nam,ap,user,pass,num){

  if(nam.trim()!='' && ap.trim()!='' && user.trim()!='' && pass.trim()!='' && num.trim()!=''){
    //ok
    return true;
  } else {
    $('#datosweb-error').fadeIn(500);
    $('#datosweb-mensaje').fadeIn(500);
      $('#datosweb-mensaje').text('Completa los campos');
    return false;
  }

}




function validar_editaruser(valor){

  if(valor.trim()!=''){
    //ok
    return true;
  } else {
    $('#editaruser-error').fadeIn(500);
    $('#editaruser-mensaje').fadeIn(500);
      $('#editaruser-mensaje').text('Completa los campos');
    return false;
  }

}






function validar_logo(valor){ 

  if(valor.trim()!=''){
    //ok
    return true;
  } else {
    $('#logo-error').fadeIn(500);
    $('#logo-mensaje').fadeIn(500);
      $('#logo-mensaje').text('Completa los campos');
    return false;
  }

}




function paginar(){
  
  $.ajax({
  type: 'POST',
  url: urlweb + 'cargar.php',
  data: 'paginar=yes',
  success: function(respuesta){
    //Cargar nuevos posts
    //cargar
    if(respuesta!=''){
    $('#listar').append(respuesta);    
    } else{
      $('#cargar').hide();
    }

  }
  });

}



function eliminar_imagen(elemento,nombre){
  
  $.ajax({
  type: 'POST',
  url: urlweb + 'inc/eliminar.php',
  data: 'nombre=' + nombre,
  success: function(respuesta){
    //Eliminar elemento
    if(respuesta!=''){
      alert('imagen borrado');
    $('#elemento'+elemento).fadeOut(500);
    }

  }
  });
}





function paginarr(){
  
  $.ajax({
  type: 'POST',
  url: urlweb + 'inc/cargarr.php',
  data: 'paginar=yes',
  success: function(respuesta){
    //Cargar nuevos posts
    //cargar
    if(respuesta!=''){
    $('#listar').append(respuesta);    
    } else{
      $('#cargar').hide();
    }

  }
  });

}



 function agregar (titulo, categoria, contenido){
    if (titulo.trim() != '' && categoria.trim() != '' && contenido.trim() != ''){
        //enviar registro
        if (categoria.trim() != "2") {
         var formData = new FormData($("#formAgregar")[0]);
         
        $.ajax({
          type:'POST',
          url: urlweb + 'inc/addpost.php',
          cache: false,
          //ata: 'user' + user + '&correo' + correo + '&pass1',
          data: formData,  
           contentType: false,
            processData: false,
          success:function(respuesta){
            console.log(respuesta)
              if (respuesta.trim()!='error') {
               //redireccionar al post nuevo
               
              location.href =respuesta;
              }  
          }
        });
      }
      else if (categoria.trim() != "1"){

          var formData = new FormData($("#formAgregar")[0]);
$.ajax({
          type:'POST',
          url: urlweb + 'inc/addpostA.php',
          cache: false,
          //ata: 'user' + user + '&correo' + correo + '&pass1',
          data: formData,  
           contentType: false,
            processData: false,
          success:function(respuesta){
            console.log(respuesta)
              if (respuesta.trim()!='error') {
               //redireccionar al post nuevo
               
              location.href =respuesta;
              }       
          }
        });
   }}
   else {
     $('#agregar-error').fadeIn(500);
     $('#agregar-mensaje').fadeIn(500);
   $('#agregar-mensaje').text('completa los campos');
   }

}
  function login(user, pass){
    if (user.trim() != '' && pass.trim() != ''){
      	//enviar registro
      	$.ajax({
      		type:'POST',
      		url: urlweb + 'login',
      		cache: false,
      		//ata: 'user' + user + '&correo' + correo + '&pass1',
      		data: $('#formInicio').serialize(),
          success:function(respuesta){
            console.log(respuesta)
              if (respuesta.trim()=='correcto') {
                //recargar la pagina
                  location.reload();
                  location.href =urlweb+'acuerdos';

              }
              else if(respuesta.trim()=='error') {
                //mostrar error
                $('#login-error').fadeIn(500);
                $('#login-mensaje').fadeIn(500);
              $('#login-mensaje').text('datos incorrectos');

              }
          }
      	});

   }
   else {
     $('#login-error').fadeIn(500);
     $('#login-mensaje').fadeIn(500);
   $('#login-mensaje').text('completa los campos');
   }

}







  function registro(nam , ap , user, correo, pass1, pass2,num){
      if (nam.trim()!='' && ap.trim() != '' && user.trim() != '' && correo.trim() != '' && pass1.trim() != '' && pass2.trim() != '' && num.trim() != '') {
        if (pass1.trim() != pass2.trim()) {
       $('#registro-error').fadeIn(500);
       $('#registro-mensaje').fadeIn(500);
      $('#registro-mensaje').text('las  contraseñas no  coinciden');


        }
        else{
          //funcion ajax|
          $.ajax({
            type:'POST',
            url: urlweb + 'inc/adduser.php',
            cache: false,
            //data: 'user' + user + '&correo' + correo + '&pass1',
            data: $('#formRegistro').serialize(),
            success:function(respuesta){
                if (respuesta.trim()=='correcto') {
                  //ir a login
                    location.href=urlweb + 'iniciar';
                }
                else if(respuesta.trim()=='existe') {
                  //mostrar error
                  $('#registro-error').fadeIn(500);
                  $('#registro-mensaje').fadeIn(500);
                $('#registro-mensaje').text('correo ya existente');
                }
            }
          });
        }

     }

     else{
        $('#registro-error').fadeIn(500);
        $('#registro-mensaje').fadeIn(500);
      $('#registro-mensaje').text('completa los campos');
  }
  }
