$(document).ready(function (){
    listar();
    $("#pesquisa").val("");
    $("#pesquisa").on("keyup", function(){
        let texto = pegar_texto_pesquisa();
        pesquisa(texto);
    });
    $(".botao-pesquisa").on("click",function(){
        let texto = pegar_texto_pesquisa();
        pesquisa(texto);
    });
  });
  
function pesquisa(palavra){
    $.ajax({
        url:'http://localhost/arquivomorto/armario/pesquisa.php',
        type:'GET',
        dataType:'json',
        data:{
            palavra
        	},
        success:function(json) {
           let html = "";
           for (let i in json ){
            html+= "<tr>";
            html+= "<td>"+(json[i]['data_criacao'])+"</td>";
            html+= "<td>"+(json[i]['usuario_responsavel'])+"</td>";
            html+= "<td>"+(json[i]['status'])+"</td>";
            html+= "<td>"+(json[i]['descricao'])+"</td>";
            html+= "<td><a href='armario/editar.php?id="+(json[i]['id'])+"' class='btn btn-warning'>Editar</a></td>";
            html+= "<td><a href='armario/desativar.php?id="+(json[i]['id'])+"&status="+(json[i]['status'])+"'class=' btn btn-danger'>Desativar</a></td>";
            
           html+= "</tr>";
           }
           console.log(html);
           $("#lista").html(html);
           
        },
        error:function(e){
        }
    });
}

function pegar_texto_pesquisa(){
   return $("#pesquisa").val();
}

function listar(){
    $.ajax({
        url:'http://localhost/arquivomorto/armario/listar.php',
        type:'GET',
        dataType:'json',
        data:{      	},
        success:function(json) {
            let html = "";
            for (let i in json){
                html+="<tr>";
                html+= "<td>"+(json[i]['data_criacao'])+"</td>";
                html+= "<td>"+(json[i]['usuario_responsavel'])+"</td>";
                html+= "<td>"+(json[i]['status'])+"</td>";
                html+= "<td>"+(json[i]['descricao'])+"</td>";
                html+= "<td><a href='armario/editar.php?id="+(json[i]['id'])+"' class='btn btn-warning'>Editar</a></td>";
                html+= "<td><a href='armario/desativar.php?id="+(json[i]['id'])+"&status="+(json[i]['status'])+"' class=' btn btn-danger'>Desativar</a></td>";

                html+="</tr>";

            }
            console.log(html);
            $("#lista").html(html);
        },
        error:function(e){
        }
    });
}
  