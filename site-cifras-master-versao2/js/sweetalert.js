function confirmarExclusao(caminho,id){
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, exclua!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = caminho+id
        }
    })
}

function salvo(){
    Swal.fire({
        //  position: 'top-end',
        icon: 'success',
        title: 'Salvo!',
        showConfirmButton: true,
        // timer: 1500
    })
}


function error(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Algo deu errado!',
        //footer: '<a href>Why do I have this issue?</a>'
    })
}