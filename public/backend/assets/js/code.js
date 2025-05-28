$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: '¿Estas seguro de Eliminar?',
                    text: "Se eliminara este dato por completo",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        '¡Eliminado!',
                        'El dato se elimino correctamente',
                        'success'
                      )
                    }
                  }) 


    });

  });
