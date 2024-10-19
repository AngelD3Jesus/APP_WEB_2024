function operaciones()
{
    let numero1=parseInt(document.getElementById("numero1").value)
    let numero2=parseInt(document.getElementById("numero2").value)
    let tipoope=parseInt(document.getElementById("operacion").value)

    switch(tipoope)
    {
        case "1":ope=numero1+numero2;break;
        case "2":ope=numero1-numero2;break;
        case "3":ope=numero1*numero2;break;
        case "4":ope=numero1/numero2;break;
    }
    
    let respuesta=document.getElementById("resultado")
    respuesta.innerHTML=`<h3>${numero1} ${tipoope} ${numero2} = ${ope}</h3>`

}