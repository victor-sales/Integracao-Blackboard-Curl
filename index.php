<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="css/style.css">   
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>

</head>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="http://www.funorte.edu.br">
        <img src="img\logo_funorte.png" width="60" height="60" alt="Ir para funorte.edu.br">    
    </a>
</nav>
<body>
    <div class="container">
        <div class="container">
            <h1 class="text-center">Arquivos de Integração BlackBoard</h1>
        </div>
        <hr>
        <div class="container-fluid">
            <form id="form" action="curl.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row d-flex justify-content-center"> 
                        <div class="col-sm-6">
                            <select class="form-control" id="select_unity" name="select_unity">
                                <option value="" selected>Escolha uma unidade</option>
                                <option value="fun_moc">Funorte - Montes Claros</option>
                                <option value="outra">-</option>
                            </select>
                        </div>    
                        <div class="col-sm-6">
                            <select class="form-control" id="select_file" name="select_file">
                                <option value="" selected>Escolha uma opção</option>
                                <option value="term">Período</option>
                                <option value="person">Aluno</option>
                                <option value="course">Curso</option>
                                <option value="membership">Relação Aluno/Curso</option>
                                <option value="userassociation">Relação Aluno/Instituição</option>
                                <option value="courseassociation">Relação Curso/Instituição</option>
                            </select>
                        </div>
                    </div> 
                </div> 
                <div class="form-group">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <div class="col-sm-2">
                            <input id="send_file" class="btn btn-primary btn-block" type="submit" value="Enviar">
                         </div>  
                    </div>  
                </div>
                             
                    
            </form>
            <div id="div_carregando" class="container"></div>
            <div id="div_table" class="container" hidden="true">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Saida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="" id="status"></td>
                                <td id="saida"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>