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

  $(function(){
      $(document).on('click','#confirmOrder',function(e){
          e.preventDefault();
          var link = $(this).attr("href");

    
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "Confirm This Data?",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, Confirm it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Confirm!',
                          'Your file has been Confirm.',
                          'success'
                        )
                      }
                    }) 


      });

    });

      $(function(){
      $(document).on('click','#processingOrder',function(e){
          e.preventDefault();
          var link = $(this).attr("href");

    
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "Processing This Data?",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, Processing it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Processing!',
                          'Your file has been Processing.',
                          'success'
                        )
                      }
                    }) 


      });

    });

      $(function(){
      $(document).on('click','#deliverdOrder',function(e){
          e.preventDefault();
          var link = $(this).attr("href");

    
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "Deliverd This Data?",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, Deliverd it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Deliverd!',
                          'Your file has been Deliverd.',
                          'success'
                        )
                      }
                    }) 


      });

    });
