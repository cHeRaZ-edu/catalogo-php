<!DOCTYPE html>
<html lang="es_mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear articulo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
    <script src="/js/Http.js"></script>
    <script src="/js/dar-alta-articulo.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto mt-5">
                <h2>Dar de alta articulo</h2>
                <form id="formCrearArticulo" action="#" method="post">
                    <div class="form-group">
                        <label for="#inputCodigo">Codigo del modelo: (*)</label>
                        <input type="text" id="inputCodigo" class="form-control" placeholder="Codigo del modelo" maxlength="70" required>
                    </div>
                    <div class="form-group">
                        <label for="#">Nombre del producto: (*)</label>
                        <input type="text" id="inputNombre" class="form-control" placeholder="Nombre del producto" maxlength="70" required>
                    </div>
                    <div class="form-group">
                        <label for="#textareaDesc">Descripcion: </label>
                        <textarea name="" id="textareaDesc" class="form-control" maxlength="125" placeholder="Maximo 125 caracteres ..." cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Campos obligatorios (*)</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalArticulo" tabindex="-1" aria-labelledby="modalArticuloLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArticuloLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalContent" class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnAccept" class="btn btn-primary">Aceptar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>