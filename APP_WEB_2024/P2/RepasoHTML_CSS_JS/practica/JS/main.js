// Comentario de una línea

/* 
Comentario
de varias líneas
*/

// Mostrar una alerta
alert("Soy una ventana de alerta");

// Variables
let nombre = "Dago";
let nombre2 = "Fiscal";
let edad = 20;
let logica = true;
let estatura = 1.85;

// Mostrar en pantalla con getElementById
let datos = document.getElementById("informacion");
datos.innerHTML = `
    <br>
    <h1>La persona: ${nombre}, tiene una altura de ${estatura}</h1>
`;

datos.innerHTML += "<h2>La edad es: " + edad + "</h2>";

// Condicionales if
if (estatura >= 1.90) {
    datos.innerHTML += `
        <hr>
        <h3>Eres una persona alta</h3>
    `;
} else {
    datos.innerHTML += `
        <hr>
        <h3>Tienes estatura promedio</h3>
    `;
}

// Ciclo for
for (let i = 1; i <= 5; i++) {
    datos.innerHTML +=` <hr><h3>For: el número es: ${i}</h3>`;
}

// Ciclo while
let j = 1;
while (j <= 5) {
    datos.innerHTML +=` <hr><h3>While: el número es ${j}</h3>`;
    j++;
}

// Ciclo do-while
let k = 1;
do {
    datos.innerHTML += `<hr><h3>Do-While: el número es ${k}</h3>`;
    k++;
} while (k <= 5);

// Funciones

//1.- funcion que no recive parametros y no regresa valor
function suma()
{
    let n1=2
    let n2=4
    suma=n1+n2
    console.log("La suma es: "+suma);
    datos.innerHTML+=`<hr><h2>La suma es: ${suma} <h3>`
}

suma();

//2.-funcion que no recive parametros y regresa valor
function suma2()
{
    let n1=3
    let n2=4
    suma=n1+n2
    return suma;
}

let sum=suma2();
datos.innerHTML+=`<hr><h2>La suma2 es: ${sum} <h3>`

//3.- que recive parametros y no regresa valor

function suma3(numero1,numero2)
{
    let n1=numero1
    let n2=numero2
    suma=n1+n2
    datos.innerHTML+=`<hr><h2>La suma3 es: ${suma} <h3>`
}

suma3(4,4)

//4.- que recive parametros y regresa valor

function suma4(numero1,numero2)
{
    let n1=numero1
    let n2=numero2
    suma=n1+n2
    return suma
}

suma=suma4(4,5)
datos.innerHTML+=`<hr><h2>La suma4 es: ${suma} </h3>`

//arreglos

let animales=[]
animales[0]="perico"
animales[1]="leon"
animales[2]="gato"

datos.innerHTML+=`<hr><h3>El rey de la selva es: ${animales[1]} <h3>`

for(let i=0;i<=animales.length;i++)
{
    datos.innerHTML+=`<hr><h3>El animal es: ${animales[i]} </h3>`
}

animales.forEach(element => {
    datos.innerHTML+=`<hr><h3>El animal es: ${element} </h3>`
});

//funcion de flecha

//funcion normal
function sumaR(a,b)
{
    return a+b
}

datos.innerHTML+=`<hr><h2>La sumaR es: ${sumaR(3,6)} </h3>`

const sumaFlecha=(a,b)=>a+b

datos.innerHTML+=`<hr><h2>La sumaFlecha es: ${sumaFlecha(3,6)} </h3>`