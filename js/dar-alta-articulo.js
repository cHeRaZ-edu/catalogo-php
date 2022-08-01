$(function () {
    let formCrearArticulo = document.getElementById("formCrearArticulo");
    formCrearArticulo.addEventListener("submit", function (e) {
        e.preventDefault();
        const inputCodigo = $("#inputCodigo").val();
        const inputNombre = $("#inputNombre").val();
        const textareaDesc = $("#textareaDesc").val();
        let articulo = {
            codigo: inputCodigo,
            nombre: inputNombre,
            desc: textareaDesc
        };
        let modal = $("#modalArticulo");
        let btnAccept = modal.find("#btnAccept");
        let btnCancel = modal.find("#btnCancel");
        let content = modal.find("#modalContent");

        let messageContent = $("<label></label>");
        messageContent.text("¿Esta seguro de agregar el articulo?");
        btnAccept.text("Si");
        btnAccept.show();
        btnCancel.text("No");
        content.empty();
        content.append(messageContent);
        modal.modal("show"); 
        btnAccept.unbind("click");
        btnAccept.click(function () {
            let http = new Http();
            http.post("/crear-articulo/crear-articulo.php",JSON.stringify(articulo)).then((res) => {
                debugger;
                let result = JSON.parse(res);
                if(result.status == 200) {
                    messageContent.text(result.message);
                }
                if(result.status == '400' && result.errors) {
                    let messageErrors = result.errors.map((error) => error.message);
                    let message = '';
                    for(let i = 0; i < messageErrors.length ; i++ ) {
                        message += `<span class='text-danger'>${messageErrors[i]}</span>` + '<br/>';
                    }
                    content.empty();
                    content.html(message);
                }
                btnCancel.text('Aceptar');
                btnAccept.hide();
            });
        });


    });
});