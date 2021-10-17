// clock
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}


function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}

// To reload with the button actualizar
function refrescar_comentarios() {
    location.reload();
}

// Simulate an HTTP redirect:
function redirect(url) {
    window.location.replace(url);    
}

// Simulate an HTTP redirect:
function logout() {
    window.location.replace("http://cesarcelis.com/delete_cookie.php");    
}

var primer_comentario = 0; // El primer comentario en publicarse, pero en realidad el ultimo en publicarse por el usuario
// Es algo asi como el primero de arriba hacia abajo y por lo tant el ultimo
var ultimo_comentario = 0;
// Carga mas comentarios
// Esta funcion la mando llamar solo la primera vez desde php desde aqui
// la segunda vez, js va a decrementar el id para obtener los siguientes 10
function load_more_comments(str) {

    ultimo_comentario = parseInt(str);

    // load more comments
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("moreComments").innerHTML = this.responseText;
        setea_estilo_para_pc();
      }
    };
    xmlhttp.open("GET","get_more_comments.php?number_of_comments="+str,true);
    xmlhttp.send();
}


// js decrementa en 10 para los siguientes 10
// usa la variable global para lograr esto
function carga_mas_comentarios_js(){

    ultimo_comentario = ultimo_comentario - 10; // This gives the name of the new div

    // load more comments
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var id = "moreComments" + ultimo_comentario.toString();
        document.getElementById(id).innerHTML = this.responseText;
        setea_estilo_para_pc();
      }
    };
    xmlhttp.open("GET","get_more_comments.php?number_of_comments="+ultimo_comentario.toString(),true);
    xmlhttp.send();

}

// Esta funcion se manda llamar cada 5 segundos, veamos si es verdad
const interval = setInterval(function() {
   // method to be executed;
   console.log('algo');

   //load new comments
   var xmlhttp = new XMLHttpRequest()
   xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("moreNewComments").innerHTML = this.responseText;
        setea_estilo_para_pc();
      }
    };
    xmlhttp.open("GET","get_new_comments.php?number_of_comments="+primer_comentario.toString(),true);
    xmlhttp.send();

 }, 5000);

// https://stackoverflow.com/questions/49197622/how-to-use-an-entity-with-textcontent
// textContent pone las cosas con HTML Entities, innerHTML si te permite meterle <BR>
// Cuando le den click a un comentario, sale una alerta, es solo para probar
// lo que me pidio mi papa que se comente un comentario especifico
function funcion_alerta(id, nombre) {
    // alert("I am an alert box!");
    // ahora haz que te muestre el id, pues pasamelo
    
    //var content = document.getElementById(id).textContent;
    //document.getElementById("comentario_referenciado").innerHTML = 'Con respecto a lo que dijo ' + nombre + ':<br>"' + content + '". <br>Quiero decir que:';
    //alert('El comentario se ha referenciado');

    // Voy a clonar el elemento para mostrarlo bonito en la parte de arriba
    var elVerdadero = document.getElementById(id).parentElement; // <--- We need parent cause child is just the comment
    var elClonado   = elVerdadero.cloneNode(true); // Creamos un clon del comentario completo
    var elDivDeArriba = document.getElementById('comentario_referenciado');
    elDivDeArriba.appendChild(elClonado); // Le pegamos como hijo el comentario al div de arriba


    // No solo quiero que copies y pegues el texto, el proximo paso que sea
    // Poner ese texto como en una div superior y que cuando el comentario
    // se publique haga referencia a esa div
    // "Comentario anterior"
    //     "Comentario nuevo sobre el comentario anterior"

    document.getElementById("parent").value = id;

    // Take user up
    scroll(0,0);
}

// To affect all fontSize at once
var fontSize = '20px'; // Este tamano solo afecta a la pc
function setea_estilo_para_pc(){
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){

    } else{



        //the event occurred, ya se cargo la pagina
        // Ahora si modifica el estilo:
        // El resto de cosas que queremos modificar cuando es una pc
        var botones = document.getElementsByClassName("botones");
        var i = 0;
        for(i = 0; i < botones.length; i++){
            botones[i].style.fontSize = fontSize; // Este tamano solo afecta a la PC
            botones[i].style.height = '40px'; // Este tamano afecta solo a la PC
            botones[i].style.width = '200px'; // Este tamano afecta solo a la PC
        }
        document.getElementById("textareaComentario").style.fontSize = fontSize;
        document.getElementById("textareaComentario").style.height = '200px'; // Esto afecta solo a la PC
        document.getElementById("textareaComentario").style.width = '800px'; // Esto solo afecta a la PC

        var i;
        // Function para eficientar el uso de los cambios de estilo en el
        // for de cada persona, asi solo tengo un for en una funcion en
        // lugar de varios fors por persona
        function loop_por_persona(label, comment, color){
            for(i = 0; i < label.length; i++){
                label[i].style.fontSize = fontSize;
                label[i].style.backgroundColor = color;
                label[i].style.color = 'white';
                label[i].style.marginBottom = '0px';
                label[i].style.marginTop = '0px';
                comment[i].style.fontSize = fontSize;
                comment[i].style.fontFamily = 'monospace';
                comment[i].style.backgroundColor = color;
                comment[i].style.color = 'black';
            }
        }

        // Creando un diccionario para el usuario y su color
        var dict = {
            'liz': 'Violet',
            'cesar': 'Gray',
            'juan': 'DodgerBlue',
            'gogo': 'SlateBlue',
            'martha': 'MediumSeaGreen',
            'jacqui': 'Orange',
            'mario': 'Tomato',
        };

        // Ahora vamos a loopear en el diccionario para setear los colors
        for(var key in dict){
            var color = dict[key];
            var label = "label_de_";
            var label = label.concat(key);
            var comment = "comentarios_de_";
            var comment = comment.concat(key);
            var label = document.getElementsByClassName(label);
            var comment = document.getElementsByClassName(comment);
            loop_por_persona(label, comment, color);
        }
    }
}


// esta funcion es para modificar el estilo de PC, a hice porque al jalar mas
// comentarios con Ajax, necesito re ejecutar esta porcion de codigo de javascript
// para poder setear los comentarios con el estilo correcto
function setea_estilo_por_primera_vez(){
    // Para cambiar el estilo con Javascript
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        // Es mobile no hagas nada por ahora
    } else {

        // Es PC
        // Espera a que cargue la pagina para modificarla
        document.addEventListener(
            'DOMContentLoaded', 
            function(event) {

                //the event occurred, ya se cargo la pagina
                // Ponle emojis a tu textarea, ya que se cargo la pagina
                // https://www.jqueryscript.net/form/emoji-picker-input-textarea.html
                // https://ili4x.github.io/inputEmoji/demo.html
                $('textarea').emoji(
                    {
                        rowSize: 13,
                        place: 'after',
                        button:'&#x1F643;',
                        fontSize:'40px',
                        emojis: ['😉','😎','👍', '🤔', '👌', '😆', '😁', '😯', '😲', '🙂', '😬', '😜']
                    }
                );
                setea_estilo_para_pc();
            }
        )
    } 
}

// Setea el estilo de cel y PC por primera vez
// las siguientes veces manda a llamar de nuevo la funcion
setea_estilo_por_primera_vez();

// Para que cuando el usuario le pique, la referencia misma se quite y no tenga que darle reload a la pagina
function quita_la_referencia(){
    var referencia = document.getElementById('comentario_referenciado');
    referencia.textContent = null; // Esto quita el texto pero falta quitar el input con el valor
    var parent = document.getElementById('parent');
    parent.value = ''; // para que en la base de datos no se inserte ningun numero de referencia en parent
    // Pruebalo
    // 1. Haz un comentario referenciado
    // 2. Quita la referencia
    // 3. Manda el comentario
    // 4. Se espera que no haiga referencia en el comentario
}

// setea el tamano de letra desde JS
function tamano_de_letra() {
  var tamano = prompt("Por favor ponga el tamano de letra", "20px");
  if (tamano != null) {
    fontSize = tamano;
    setea_estilo_para_pc();
    var body = document.getElementById("body");
    body.style.fontSize = tamano;
  }
}