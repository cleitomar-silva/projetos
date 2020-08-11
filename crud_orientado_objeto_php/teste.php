function preco()
{
        
        var precos = <?php echo json_encode(get_field('preco')); ?>       
        var nomeUsuario = document.getElementsByName('nome')[1].value;
        var nomeEmail = document.getElementsByName('email')[1].value;
        var nomeTelefone = document.getElementsByName('telefone')[1].value;
               

        if(nomeUsuario != '' && nomeEmail != '' && nomeTelefone != '')
        {
           document.getElementById("preco").innerHTML = precos; 
           console.log(precos);        

        }
}
    
    
//Loop vindo php Foreach    
    
function checkup()
{
        var precos = <?php echo json_encode($cards)?>

        var js = document.getElementsByClassName('js');
        var nomeUsuario = document.getElementsByName('nome')[0].value;
        var nomeEmail = document.getElementsByName('email')[0].value;
        var nomeTelefone = document.getElementsByName('telefone')[0].value;


        if(nomeUsuario != '' && nomeEmail != '' && nomeTelefone != '')
        {
            for(var key in precos)
            {
                let texto = js[key].innerHTML = 'R$ '+precos[key]['preco'];
                console.log(texto);
            
            }

        }
}



//mascara telefone
//<input type="text" name="telefone" id="telefone" maxlength="15" />
   function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('telefone').onkeypress = function(){
            mascara( this, mtel );
        }
    }