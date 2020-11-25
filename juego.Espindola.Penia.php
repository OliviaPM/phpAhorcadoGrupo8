<?php

/****************************************************************************************************
 * GRUPO N°8 
 * ESPINDOLA, DARIO G.  - FAI-1220  -   https://github.com/DarioEspindola/phpAhorcadoGrupo8.git
 * PEÑA MUÑOZ, OLIVIA P. - FAI-3122 -   https://github.com/OliviaPM/phpAhorcadoGrupo8.git  

 ****************************************************************************************************/




/** ----- FUNCIÓN N° 1 -----------------------------------------------------------------------------------------------------
* Módulo encargado de generar una Colección de Palabras al principio del programa, para poder comenzar a jugar al AHORCADO.
* Este arreglo multidimensional contiene la información de cada palabra disponible para jugar: palabra, pista y puntos
* obtenidos al descubrirla. 
* No utiliza parámetros de entrada. Retorna el arreglo de palabras.   
* @return array
*/

function cargarPalabras() {
    #ARRAY $coleccionPalabras

    $coleccionPalabras = array();
    $coleccionPalabras[0] = array("palabra" => "esgrima", "pista" => "Deporte de combate de arma blanca", "puntosPalabra" => 8);
    $coleccionPalabras[1] = array("palabra" => "paleolitico", "pista" => "El período prehistórico más antiguo", "puntosPalabra" => 8);
    $coleccionPalabras[2] = array("palabra" => "volkswagen", "pista" => "Marca de vehículo", "puntosPalabra" => 10);
    $coleccionPalabras[3] = array("palabra" => "java", "pista" => "Lenguaje de programación estático", "puntosPalabra" => 6);
    $coleccionPalabras[4] = array("palabra" => "dinamarca", "pista" => "País nórdico", "puntosPalabra" => 8);
    $coleccionPalabras[5] = array("palabra" => "invierno", "pista" => "Estación del año", "puntosPalabra" => 6);
    $coleccionPalabras[6] = array("palabra" => "violin", "pista" => "Instrumento de cuerda", "puntosPalabra" => 6);
    return $coleccionPalabras;
}

/** ----- FUNCIÓN N° 2 -----------------------------------------------------------------------------------------------------
* Módulo encargado de generar una Colección de Juegos ya jugados.
* Este arreglo multidimensional almacena información sobre las partidas jugadas: puntaje obtenido y palabra con la que 
* se jugó.  
* No utiliza parámetros de entrada. Retorna el arreglo de juegos. 
* @return array
*/
function cargarJuegos(){
    #ARRAY $coleccionJuegos;

    $coleccionJuegos = array();
    $coleccionJuegos[0] = array("puntos" => 0, "indicePalabra" => 1);
    $coleccionJuegos[1] = array("puntos" => 11, "indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos" => 0, "indicePalabra" => 1);
    $coleccionJuegos[3] = array("puntos" => 10, "indicePalabra" => 0);
    $coleccionJuegos[4] = array("puntos" => 9, "indicePalabra" => 4);
    $coleccionJuegos[5] = array("puntos" => 0, "indicePalabra" => 6);
    $coleccionJuegos[6] = array("puntos" => 12, "indicePalabra" => 5);
    return $coleccionJuegos;
}

/** ----- FUNCIÓN N° 3 -----------------------------------------------------------------------------------------------------
* Módulo encargado de generar una Colección de Letras a partir de una palabra. 
* Utiliza como parámetro de entrada un valor de tipo STRING que luego fragmenta y transforma en un arreglo indexado que   
* contiene otro de tipo asociativo con las claves: letra y descubierta. 
* Retorna el arreglo de letras. 
* @param string $palabra
* @return array
*/
function dividirPalabraEnLetras($palabra){
    #ARRAY $coleccionLetras
    #INTEGER $i

    $coleccionLetras = array();
    for ($i = 0; $i < strlen($palabra); $i++) { //se utiliza la funcion STRLEN para dividir la palabra en letras. 
        $coleccionLetras[$i] = array("letra" => $palabra[$i], "descubierta" => false); //arreglo multidimensional: indexado y asociativo. 
    }
    return $coleccionLetras;
}

/** ----- FUNCIÓN N° 4 -----------------------------------------------------------------------------------------------------
* Este módulo no utiliza parámetros de entrada. Es el encargado de mostrar por pantalla un Menú de Opciones.
* Solicita al usuario que ingrese una opción, verificando que se ingrese un valor válido.
* Una vez verificado dicho valor, procede a retornarlo al programa principal.
* @return int
*/
function seleccionarOpcion(){
    #INTEGER $opcion

    echo "┌─┴───────────────────────────────────────────────────────────────────────────────────────────────────────────┐\n";
    echo "│                                                                                                             │\n";
    echo "│—→ 1) Jugar con una palabra aleatoria                                                                        │\n";
    echo "│—→ 2) Jugar con una palabra elegida                                                                          │\n";
    echo "│—→ 3) Agregar una palabra al listado                                                                         │\n";
    echo "│—→ 4) Mostrar la información completa de un número de juego                                                  │\n";
    echo "│—→ 5) Mostrar la información completa del primer juego con más puntaje                                       │\n";
    echo "│—→ 6) Mostrar la información completa del primer juego que supere un puntaje indicado                        │\n";
    echo "│—→ 7) Mostrar la lista de palabras ordenada alfabéticamente                                                  │\n";
    echo "│—→ 8) SALIR DEL JUEGO                                                                                        │\n";
    echo "│                                                                                                             │\n";
    echo "└─┬───────────────────────────────────────────────────────────────────────────────────────────────────────────┘\n";
    
    do {
        echo "┌─┴──────────────────────────\n";
        echo "│ Seleccione una opción: ";
        $opcion = trim(fgets(STDIN));
        echo "└─┬──────────────────────────\n";
        
            if ($opcion < 1 || $opcion > 8){
                echo "┌─┴──────────────────────────────────────┐\n";
                echo "│ ►► La opción ingresada NO es válida ◄◄ │\n";
                echo "│     ►  Ingrese una opción válida  ◄    │\n";
                echo "└─┬──────────────────────────────────────┘\n";
            }

    } while ($opcion < 1 || $opcion > 8);
    
    return $opcion;
}

/** ----- FUNCIÓN N° 5 -----------------------------------------------------------------------------------------------------
* Módulo encargado de determinar si una palabra existe en la Colección de Palabras que posee el juego.
* Recibe por parámetro de entrada el arreglo de palabras y la palabra ingresada por el usuario. Realiza un recorrido parcial
* por el arreglo en busca de coincidencias con la palabra que se ha ingresado. 
* Retorna TRUE si la palabra ya existe en la Colección y FALSE para el caso contrario.  
* @param array $coleccionPalabras
* @param string $palabra
* @return boolean
*/
function existePalabra($coleccionPalabras,$palabra){
    #INTEGER $i, $cantPal
    #BOOLEAN $existe

    $i=0; //variable contador
    $cantPal = count($coleccionPalabras);
    $existe = false; // variable bandera

    while (!$existe && $i < $cantPal){ //La estructura repetitiva se mantendrá mientras $existe sea FALSE y no se supere la cantidad 
        //de palabras contenidas en la Colección.                         
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i++;
    }

    return $existe;
}

/** ----- FUNCIÓN N° 6 -----------------------------------------------------------------------------------------------------
* Módulo encargado de determinar si una letra existe en el arreglo de letras.
* Utiliza como parámetro de entrada la Colección de Letras correspondiente y una letra ingresada por el usuario para jugar. 
* Compara ésta última con las letras dentro de la colección y en caso de hallar coincidencia, retorna el valor TRUE. Caso
* contrario, devuelve FALSE. 
* @param array $coleccionLetras
* @param string $letra
* @return boolean
*/
function existeLetra($coleccionLetras, $letra){
    #INTEGER $i, $canLet
    #BOOLEAN $existe

    $i = 0; //variable contador 
    $cantLet = count($coleccionLetras);
    $existe = false; //variable bandera
    while ($i < $cantLet && !$existe){ 
        if ($coleccionLetras[$i]["letra"] == $letra) {
            $existe = true;
        }
        $i++;        
    }
    return $existe;
}

/** ----- FUNCIÓN N° 7 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetro de entrada la Colección de Palabras. Solicita al usuario el nombre de la palabra,
* la pista y el puntaje que se obtiene al adivinar la palabra durante el juego. Además, se verifica que la palabra ingresada 
* no exista en el arreglo de palabras.
* Finalmente, retorna la Colección de Palabras modificada con la nueva palabra. 
* @param array $coleccionPalabras
* @return array  
*/
function agregarPalabra($coleccionPalabras){
    #INTEGER $ultimaPosicion, puntosPalabraN
    #STRING $palabraNueva, pistaPalabraN
    #ARRAY $coleccionPalabras 

    $ultimaPosicion = count($coleccionPalabras);

    do {//La estructura repetitiva cesará cuando la palabra ingresada NO se encuentre en la Colección y además, cumpla los criterios. 
        echo "┌─┴──────────────────────────────────────────────────────\n";
        echo "│ Ingrese una palabra nueva para almacenar.\n";
        echo "└─┐	Palabra: ";
        $palabraNueva = strtolower(trim(fgets(STDIN)));
        $palabraNueva = trim ($palabraNueva);

        if (!verificarPalabra($palabraNueva)){
            echo "┌─┴────────────────────────────────────────────────────────┐\n";	
            echo "│ ►► La palabra ingresada no cumple con las condiciones ◄◄ │\n";
            echo "│  ►► Recuerde ingresar solo una palabra, sin espacios ◄◄  │\n";
            echo "└─┬────────────────────────────────────────────────────────┘\n";
        } elseif (existePalabra($coleccionPalabras, $palabraNueva)) {
                echo "┌─┴────────────────────────────────────────────────┐\n";	
                echo "│ ►► La palabra ingresada ya existe en el juego ◄◄ │\n";
                echo "└─┬────────────────────────────────────────────────┘\n";
        }

    } while (!verificarPalabra($palabraNueva) || existePalabra($coleccionPalabras, $palabraNueva));

    echo "┌─┘\n│ Ingrese la pista.\n";
    echo "│	Pista: ";
    $pistaPalabraN = trim(fgets(STDIN));
    echo "│\n│ Indique el valor de los puntos.\n";
    echo "│	Puntos: ";
    $puntosPalabraN = trim(fgets(STDIN));
    echo "└─┬──────────────────────────────────────────────────────\n";

    //Ingresados todos los datos referidos a la nueva palabra, se agrega a la Colección de Palabras en la última posición del índice:
    $coleccionPalabras[$ultimaPosicion] = array("palabra" => $palabraNueva, "pista" => $pistaPalabraN, "puntosPalabra" => $puntosPalabraN);

    return $coleccionPalabras;
}

/** ----- FUNCIÓN N° 8 -----------------------------------------------------------------------------------------------------
* Módulo encargado de obtener un indice aleatorio dentro de un rango (mínimo-máximo), para luego retornarlo al módulo que lo invocó.
* Utiliza como parámetros de entrada el valor máximo, obtenido del total de elementos contenidos en un arreglo determinado, y el valor
* mínimo (1 para el usuario, 0 para los índices de los arreglos del juego). 
* @param int $min
* @param int $max
* @return int
*/
function indiceAleatorioEntre($min, $max){
    #INTEGER $numAleatorio

    $numAleatorio = rand($min, $max) - 1; // La función RAND devuelve un número entero de forma aleatoria. 
    //Al valor obtenido se le resta 1, ya que el índice de la Colección de Palabras comienza en 0 y todos los valores
    //disponibles para el usuario inician en 1. De este modo se equilibra el desfase numérico.   
    return $numAleatorio;
}

/** ----- FUNCIÓN N° 9 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetros de entrada valores mínimo y máximo referidos a un arreglo de elementos. Solicita 
* al usuario que ingrese un número que se encuentre dentro de ese rango. 
* Retorna el valor ingresado por el usuario. 

* @param int $min
* @param int $max
* @return int
*/
function solicitarIndiceEntre($min,$max){ 
    #INTEGER $numIngresado
    
    do{
        echo "┌─┴────────────────────────────────────────────\n";
        echo "│ Seleccione un valor entre $min y $max.\n";
        echo "│\tValor: ";
        $numIngresado = trim(fgets(STDIN));
        echo "└─┬────────────────────────────────────────────\n";

        if ($numIngresado < $min || $numIngresado > $max) {//en caso de que se ingrese un valor fuera de rango, se emite un alerta:
            echo "┌─┴────────────────────────────────────────────────────────────┐\n";
            echo "│ ►► El valor seleccionado esta fuera del rango entre " .$min." y ".$max." ◄◄ │\n";
            echo "└─┬────────────────────────────────────────────────────────────┘\n";
        }

    } while(!($numIngresado>=$min && $numIngresado<=$max));

    $numIngresado --; //siendo el 1 el valor mínimo visualizado por el usuario y 0 el del índice numérico del arreglo, resulta 
    //necesario restarle 1 al valor ingresado para ajustarlo con la numeración interna de la Colección de Palabras. 
    return $numIngresado;
}

/** ----- FUNCIÓN N° 10 -----------------------------------------------------------------------------------------------------
* Módulo encargado de determinar si la palabra fue descubierta, es decir, si todas las letras fueron descubiertas.
* Realiza un recorrido parcial, analizando el valor de la clave "descubierta". 
* Utilizando como parámetro de entrada la Colección de Letras, retorna FALSE si al menos una letra almacena en su clave
* "descubierta" dicho valor. Caso contrario, retorna TRUE. 
* @param array $coleccionLetras
* @return boolean
*/
function palabraDescubierta($coleccionLetras){
    #INTEGER $i, $cantLetras
    #BOOLEAN $descubierta    

    $i = 0;// variable contador
    $cantLetras = count($coleccionLetras); // valor máximo de iteraciones a realizar en la estructura repetitiva
    $descubierta = true;

    // Las iteraciones se realizarán hasta que se llegue a la máxima cantidad de letras o que la letra no haya sido descubierta:
    while ($i < $cantLetras && $coleccionLetras[$i]["descubierta"] == true) {
        $i++;        
    }
    
    //Si al menos una letra no ha sido descubierta, la variable $descubierta cambiará a FALSE: 
    if ($i < $cantLetras && $coleccionLetras[$i]["descubierta"] == false) { 
        $descubierta = false;
    }

    return $descubierta;    
}   


/** ----- FUNCIÓN N° 11 -----------------------------------------------------------------------------------------------------
* Este módulo, que no utiliza parámetros de entrada, solicita al usuario el ingreso de una letra para descubrir la palabra del juego.
* Verifica que efectivamente se haya ingresado una y sólo una letra, y cuando se cumple dicha condición retorna dicha letra. 
* Caso contrario, continúa solicitando el ingreso de una sola letra.
* @return string
*/
function solicitarLetra(){
    #BOOLEAN $letraCorrecta
    #STRING $letra

    $letraCorrecta = false; //variable bandera
    do {
        echo "┌─┴────────────────────────────────\n";
        echo "│ Por favor, ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN))); //se convierte la letra a minúsculas para hacer la comparación posterior
        echo "└─┬────────────────────────────────\n";

        if(strlen($letra)!=1){ //se verifica que se haya ingresado un caracter
            echo "┌─┴────────────────────────────────────┐\n";
            echo "│ ►► ¡Debe ingresar solo \"1\" letra! ◄◄ │\n";
            echo "└─┬────────────────────────────────────┘\n";
        }else{
            $letraCorrecta = true;
        }
                
    } while(!$letraCorrecta);
    
    return $letra;
}


/** ----- FUNCIÓN N° 12 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetros de entrada la Colección de Letras correspondientes a la palabra con la que se está 
* jugando y la letra ingresada por el usuario para lograr adivinarla. Cuando la letra ingresada coincide con alguna de 
* la colección, el valor de la clave "descubierta" cambia a TRUE. 
* Retorna la Colección de Letras modificada con los valores TRUE hallados.
* @param array $coleccionLetras
* @param string $letra
* @return array 
*/
function destaparLetra($coleccionLetras, $letra){
    #INTEGER $i
    #ARRAY $coleccionLetras

    for ($i = 0; $i < count($coleccionLetras); $i++) {//se recorre todo el arreglo de letras verificando si existe coincidencia. 
    
        if ($coleccionLetras[$i]["letra"] == $letra) {   
            //cuando las letras coinciden, se cambia el valor de la clave "descubierta" a TRUE. Modificándose el arreglo.        
            $coleccionLetras[$i] = array("letra" => $letra, "descubierta" => true);
        }
    }
    return $coleccionLetras;//se retorna el arreglo modificado    
}

/** ----- FUNCIÓN N° 13 -----------------------------------------------------------------------------------------------------
* Esta función utiliza como parámetro de entrada la colección de letras con valores TRUE y FALSE en la clave "descubierta", 
* acumula letras y " * " según sean respectivamente los valores de dicha clave.
* Retorna la palabra con las letras descubiertas. 
* @param array $coleccionLetras
* @return string 
*/
function stringLetrasDescubiertas($coleccionLetras){
    #STRING $pal
    #INTEGER $i
  
    $pal = "";

    //Se realiza un recorrido por todo el arreglo, concatenando las letras descubiertas y asteriscos en una variable STRING:
    for ($i = 0; $i < count($coleccionLetras); $i++) { 

        if ($coleccionLetras[$i]["descubierta"] == true) {
            $pal = $pal . $coleccionLetras[$i]["letra"];
        } else {
            $pal = $pal . "*";
        }
    }
    return $pal;
}


/** ----- FUNCIÓN N° 14 -----------------------------------------------------------------------------------------------------
* Este módulo desarrolla el juego y retorna el puntaje obtenido en la partida jugada.
* Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron
* Si no descubre la palabra el puntaje es 0.
* @param array $coleccionPalabras
* @param int $indicePalabra
* @param int $cantIntentos
* @return int 
*/
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos){
    #STRING $pal, $letra
    #ARRAY $coleccionLetras
    #INTEGER $puntaje
    #BOOLEAN $existe, $palabraFueDescubierta

    $pal = $coleccionPalabras[$indicePalabra]["palabra"]; //se almacena la palabra en juego dentro de la variable $pal
    $coleccionLetras = dividirPalabraEnLetras($pal);//se crea la Colección de Letras correspondiente a la palabra en juego
    $puntaje = 0;//se inicializa el puntaje de la partida en 0 
    echo "┌─┴───────────────────────────────────────────────────────────\n";
    echo "│ Pista:      \"".$coleccionPalabras[$indicePalabra]["pista"]."\"\n"; // se muestra por pantalla la PISTA de la palabra
    echo "└─┬───────────────────────────────────────────────────────────\n";

    do {
        $letra = solicitarLetra();//se hace la invocación a la función que solicitará la letra para jugar
        $existe = existeLetra($coleccionLetras, $letra);

        if ($existe) {
            //si la letra existe dentro de la Colección de Letras, se mostrará (destapará) la posición que ocupa en la palabra:
            $coleccionLetras = destaparLetra($coleccionLetras, $letra);
            echo "┌─┴─────────────────────────────────────────────────────────\n";
            echo "│ Palabra a descubrir:	";  
            echo stringLetrasDescubiertas($coleccionLetras);                                 
            echo "\n└─┬─────────────────────────────────────────────────────────\n";
        } else {
            $cantIntentos--;//si la letra NO existe en la Colección de Letras, entonces se resta un intento
            echo "┌─┴─────┬──────────────────────────────────────────┬───────\n";
            echo "│       └── La letra \"".$letra."\" NO existe en la palabra ──┘\n│\n";    
            echo "│		 ►► Le quedan ".$cantIntentos." intentos ◄◄ \n";       // Muestra la cantidad de intentos que quedan por jugar.
            echo "└─┬────────────────────────────────────────────────────────\n";
            echo "┌─┴─────────────────────────────────────────────────────────\n";
            echo "│ Palabra a descubrir:	";  
            echo stringLetrasDescubiertas($coleccionLetras);                                 
            echo "\n└─┬─────────────────────────────────────────────────────────\n";
        }

        $palabraFueDescubierta = palabraDescubierta($coleccionLetras);
    } while ($cantIntentos > 0 && !($palabraFueDescubierta)); //se jugará mientras queden intentos y la palabra no haya sido descubierta

    if ($palabraFueDescubierta) {
        //se obtiene el puntaje de la partida (puntos de la palabra descubierta + cantidad de intentos que quedaron):
        $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] + $cantIntentos;
        echo "─────────────────────────────────────────────────────────────────\n"; 
        echo "                ┌───────────────────────────────┐\n";                   
        echo "●───────────●───┤————→ ¡  G A N A S T E  ! ←————├───●───────────●\n";
        echo "                └───────────────────────────────┘\n";
        echo "\t\t●● Tu puntaje fue de ".$puntaje." puntos ●●\n";                   // Muestra por pantalla los puntos obtenidos.
        echo "─────────────────────────────────────────────────────────────────\n";
    } else {
        echo "───────────────────────────────────────────────────────────────────────────────\n";
        echo "                       ┌───────────────────────────────┐\n";                   
        echo "♦──────────────────♦───┤————→ ¡ A H O R C A D O ! ←————├───♦──────────────────♦";
        cartelAhorcado(); //se invoca la imagen correspondiente por haber perdido el Juego del Ahorcado
        echo "───────────────────────────────────────────────────────────────────────────────\n";
    }

    return $puntaje;
}

/** ----- FUNCIÓN N° 15 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetros de entrada la Colección de Juegos ya existente, el puntaje obtenido en la 
* partida jugada recientemente y el índice de la palabra con la cual se jugó. Agrega toda esa información a la colección,
* retornándola modificada.
* @param array $coleccionJuegos
* @param int $puntos
* @param int $indicePalabra
* @return array 
*/
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    #INTEGER $indiceJuego
    #ARRAY $coleccionJuegos

    $indiceJuego = count($coleccionJuegos);
    $coleccionJuegos[$indiceJuego] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/** ----- FUNCIÓN N° 16 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetros de entrada la Colección de Palabras y el índice numérico que hace referencia 
* a la palabra buscada en dicho arreglo. No retorna valores, sólo muestra la información por pantalla. 
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
function mostrarPalabra($coleccionPalabras,$indicePalabra){
    
    echo "│	\t- Palabra: ".$coleccionPalabras[$indicePalabra]["palabra"]."\n";
    echo "│	\t- Pista: \"".$coleccionPalabras[$indicePalabra]["pista"]."\"\n";
    echo "│	\t- Valor de puntos: ".$coleccionPalabras[$indicePalabra]["puntosPalabra"]."\n";
    echo "└─┬──────────────────────────────────────────────────────\n";    
}

/** ----- FUNCIÓN N° 17 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetros de entrada la Colección de Juegos, la Colección de Palabras y el índice referente 
* al juego del cual se desea obtener información. Se muestran por pantalla los datos de la partida elegida.
* No retorna valores.
* @param array $coleccionJuegos
* @param array $coleccionPalabras
* @param int $indiceJuego
*/
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){  
    //se organiza la información para ser mostrada por pantalla:  
    echo "┌─┴──────────────────────────────────────────────────────\n";
    echo "│\t——→ Juego ".($indiceJuego + 1)." ←——\n";
    echo "│  ● Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "│  ● Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
}

/** ----- FUNCIÓN N° 18 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetro de entrada la Colección de Juegos y realiza un recorrido por todo el arreglo en busca
* de la partida con mayor puntaje obtenido. Retorna el número de índice del arreglo en cuya ubicación se encuentra el 
* juego de mayor puntaje. 
* @param array $coleccionJuegos
* @return int
*/
function juegoMayorPuntaje ($coleccionJuegos){
    #INTEGER $i, $mayorPuntaje, $indiceMayorPts

    $i = 0;//variable contador
    $mayorPuntaje = 0;

    for ($i = 0; $i < count($coleccionJuegos); $i++){            
        
        if ($coleccionJuegos[$i]["puntos"] > $mayorPuntaje){
            $mayorPuntaje = $coleccionJuegos[$i]["puntos"];
            $indiceMayorPts = $i;
        }
  	}
    return $indiceMayorPts;
}

/** ----- FUNCIÓN N° 19 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetro de entrada la Colección de Juegos y el puntaje indicado por el usuario. 
* Realiza un recorrido parcial por el arreglo en busca de la primer partida (en orden de ocurrencia) que tenga un puntaje 
* mayor al que ingresó el usuario.
* Retorna el número de índice del arreglo en cuya ubicación se encuentra el buscado juego. En caso que dicho juego no exista,
* se retorna -1.  
* @param array $coleccionJuegos
* @param int $puntajeIndicado
* @return int
*/
function juegoMayorQue ($coleccionJuegos, $puntajeIndicado){
    #INTEGER $i, $indiceBuscado

    $i = 0;//variable contador
    $indiceBuscado = -1;//si no existe ningún juego que supere el valor ingresado por el usuario, se retornará -1
    do { 

        //si un juego del arreglo supera el puntaje indicado por el usuario, el valor de su índice es almacenado en 
        //la variable $indiceBuscado:    
        if ($coleccionJuegos[$i]["puntos"] > $puntajeIndicado){
            $indiceBuscado = $i;
        }
        $i++;

    } while (!($indiceBuscado != -1 || $i >= count($coleccionJuegos)));

    return $indiceBuscado;
}

/** ----- FUNCIÓN N° 20 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetro de entrada la Colección de Palabras que posee el juego. Las ordena alfabéticamente 
* y muestra por pantalla toda la información del arreglo: palabra, pista y puntos obtenidos. 
* No retorna valores. 
* @param array $coleccionPalabras
*/
function mostrarPalabrasOrdenadas ($coleccionPalabras){
    #INTEGER $indice
    #STRING $key

    echo "┌─┴─────────────────────────────────────────────────────────────────────────────\n";
    echo "│ A continuación, se muestran las palabras ordenadas alfabéticamente:\n│\n";
    sort($coleccionPalabras); //con la función SORT se ordenan alfabéticamente los elementos del arreglo

    foreach ($coleccionPalabras as $indice){//se utiliza la función FOREACH para recorrer todo el arreglo a través de su índice
        
        foreach ($indice as $key => $value){ //la variable $value toma valores de tipo STRING e INTEGER 
            echo "│\t".$key." : ".$value."\n"; // en cada iteración se escriben la clave y su valor almacenado en ella
        }
        
        echo "│\n";
    }

    echo "└─┬─────────────────────────────────────────────────────────────────────────────\n";

}

/** ----- FUNCIÓN N° 21 -----------------------------------------------------------------------------------------------------
* Este módulo utiliza como parámetro de entrada la palabra ingresada por el usuario y verifica que no contenga espacios 
* vacíos en medio de los caracteres, bien sea por error dactilográfico o por ingresar 2 palabras separadas. 
* Retorna TRUE si la cadena NO cuenta con espacios en blanco y FALSE en caso contrario. 
* @param string $palabraNueva
* @return boolean
*/
function verificarPalabra($palabraNueva) {
    #INTEGER $i, $totalLetras
    #BOOLEAN $cumple

    $i = 0;// variable contador
    $cumple = true; //variable bandera

    $totalLetras = strlen($palabraNueva); //se utiliza la función STRLEN para recorrer el STRING como si fuera un arreglo

    do {
        if ($totalLetras < 1) {// si no contiene al menos un caracter, la bandera cambia a FALSE
            $cumple = false;
        } elseif ($palabraNueva[$i] == " ") { //cuando la cadena contiene espacios en su interior, la bandera cambia a FALSE
            $cumple = false;
        } else {
            $i++;
        }
    } while ($cumple && $i < $totalLetras);

    return $cumple;
}


/*******************************************/
/************** PROGRAMA PRINCIPAL ********/
/******************************************/
/* El programa principal realiza la precarga de los arreglos de Palabras y Juegos. Muestra un listado de opciones que sólo
dejarán de aparecer cuando se elija la opción de SALIR del juego. Dentro de cada opción se invoca a las respectivas funciones
que desarrollarán el juego en su totalidad*/

#INTEGER $intentos, $min, $opcion, $indiceAlternativo, $pts, $indiceElegido, $verJuego, $juegoMasPts, $puntajeIndicado, $indiceObtenido
#ARRAY $palabras, $juegos

    define("CANT_INTENTOS", 6); //Constante en PHP para la cantidad de intentos que tendrá el jugador para descubrir la palabra.
    $intentos = CANT_INTENTOS;
    $min = 1;
    $palabras = cargarPalabras(); //se carga el arreglo de palabras 
    $juegos = cargarJuegos(); // se carga el arreglo de juegos 
    
    cartelInicio(); // se carga el cartel del juego
    
    do{
        $opcion = seleccionarOpcion();
        switch ($opcion) { //se utiliza la función SWITCH como estructura de alternativa múltiple (misma funcionalidad que varios IF)

        case 1: //Iniciar el juego con una palabra aleatoria
                $indiceAlternativo = indiceAleatorioEntre($min, count($palabras));
                $pts = jugar($palabras, $indiceAlternativo, $intentos);//se almacenan los puntos obtenidos en la partida jugada
                $juegos = agregarJuego($juegos, $pts, $indiceAlternativo);//se guardan los datos de la partida en la Colección de Juegos
            break;

        case 2: //Inicia el juego con una palabra elegida por el usuario
                $indiceElegido = solicitarIndiceEntre($min, count($palabras));
                $pts = jugar($palabras, $indiceElegido, $intentos);
                $juegos = agregarJuego($juegos, $pts, $indiceElegido);
            break;

        case 3: //Permite al usuario agregar una palabra al listado que tiene el juego
                $palabras = agregarPalabra($palabras);
            break;

        case 4: //Muestra la información completa de un número de juego
                echo "┌─┴───────────────────────────────────\n";
                echo "│ Para visualizar un Juego,\n";
                $verJuego = solicitarIndiceEntre($min, count($juegos)); 
                mostrarJuego($juegos, $palabras, $verJuego);
            break;

        case 5: //Muestra la información completa del primer juego (en orden cronológico de jugadas) con más puntaje
                $juegoMasPts = juegoMayorPuntaje ($juegos);
                mostrarJuego($juegos, $palabras, $juegoMasPts);
            break;

        case 6: //Muestra la información completa del primer juego (en orden cronológico) que supere un puntaje indicado por el usuario
                echo "┌─┴─────────────────────────────────\n";
                echo "│ Ingrese un puntaje a superar: ";
                $puntajeIndicado = trim(fgets(STDIN));
                echo "└─┬─────────────────────────────────\n";
                $indiceObtenido = juegoMayorQue ($juegos, $puntajeIndicado);

                if ($indiceObtenido != -1){
                    mostrarJuego($juegos, $palabras, $indiceObtenido);
                } else {     //si el valor retornado es -1 significa que no hay juegos que cumplan el criterio
                    echo "┌─┴──────────────────────────────────────────────────────\n";
                    echo "│ No existe un juego con puntaje mayor a ".$puntajeIndicado." puntos.";
                    echo "\n└─┬──────────────────────────────────────────────────────\n";
                }  
            break;

        case 7: //Muestra la lista de palabras que posee el juego, ordenadas alfabéticamente
                mostrarPalabrasOrdenadas($palabras);
            break;

        case 8: //Muestra el cartel de despedida
                echo "┌─┴──────────────────────────────────────────────────────\n";
                echo "│ ¡¡ GRACIAS POR JUGAR !!\n";
                echo "└─┬──────────────────────────────────────────────────────\n";
            break;
        }

    } while ($opcion != 8);

/** ----- FUNCIÓN A -----------------------------------------------------------------------------------------------------
* Módulo encargado de mostrar un cartel de presentación por pantalla al iniciar el programa. 
* No tiene parámetros de entrada ni retorno. 
*/
function cartelInicio(){

    echo "\n\n";
    echo "▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓ EL  JUEGO  DEL ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
                                                                                                                       
                   ░▓▓▓▓▓    ░▓▓      ░▓▓    ░▓▓▓▓▓    ░▓▓▓▓▓▓▓▓▓    ░▓▓▓▓▓▓▓▓     ░▓▓▓▓▓    ░▓▓▓▓▓▓▓▓       ░▓▓▓▓▓              
                  ░▓▓  ░▓▓   ░▓▓      ░▓▓   ░▓▓  ░▓▓   ░▓▓     ░▓▓  ░▓▓     ░▓▓   ░▓▓  ░▓▓   ░▓▓    ░▓▓     ░▓▓  ░▓▓             
                 ░▓▓    ░▓▓  ░▓▓      ░▓▓  ░▓▓    ░▓▓  ░▓▓    ░▓▓  ░▓▓           ░▓▓    ░▓▓  ░▓▓     ░▓▓   ░▓▓    ░▓▓            
                ░▓▓      ░▓▓ ░▓▓      ░▓▓ ░▓▓      ░▓▓ ░▓▓   ░▓▓   ░▓▓          ░▓▓      ░▓▓ ░▓▓      ░▓▓ ░▓▓      ░▓▓           
                ░▓▓      ░▓▓ ░▓▓▓▓▓▓▓▓▓▓▓ ░▓▓      ░▓▓ ░▓▓▓▓▓▓▓    ░▓▓          ░▓▓      ░▓▓ ░▓▓      ░▓▓ ░▓▓      ░▓▓           
                ░▓▓▓▓▓▓▓▓▓▓▓ ░▓▓      ░▓▓ ░▓▓      ░▓▓ ░▓▓   ░▓▓   ░▓▓          ░▓▓▓▓▓▓▓▓▓▓▓ ░▓▓      ░▓▓ ░▓▓      ░▓▓           
                ░▓▓      ░▓▓ ░▓▓      ░▓▓  ░▓▓    ░▓▓  ░▓▓    ░▓▓  ░▓▓          ░▓▓      ░▓▓ ░▓▓     ░▓▓   ░▓▓    ░▓▓            
                ░▓▓      ░▓▓ ░▓▓      ░▓▓   ░▓▓  ░▓▓   ░▓▓     ░▓▓  ░▓▓     ░▓▓ ░▓▓      ░▓▓ ░▓▓    ░▓▓     ░▓▓  ░▓▓             
                ░▓▓      ░▓▓ ░▓▓      ░▓▓    ░▓▓▓▓▓    ░▓▓      ░▓▓  ░▓▓▓▓▓▓▓▓  ░▓▓      ░▓▓ ░▓▓▓▓▓▓▓▓       ░▓▓▓▓▓               
                                                                                                               
▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓\n
                                                                                                              developed by Daro & Oli\n\n";

}

/** ----- FUNCIÓN B -----------------------------------------------------------------------------------------------------
* Módulo encargado de mostrar un cartel cuando el usuario pierde el Juego del Ahorcado. 
* No tiene parámetros de entrada ni retorno. 
*/
function cartelAhorcado (){

    echo "
    ┌──────────────────┴                               ┴──────────────────┐
    │ X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X │
    │ X                                                                 X │
    │ X                   .-.                     .-.                   X │
    │ X                .--' /                     \ '--.                X │
    │ X                '--. \       _______       / .--'                X │ 
    │ X                    \ \   .-'       '-.   / /                    X │
    │ X                     \ \ /             \ / /                     X │ 
    │ X                      \ /               \ /                      X │
    │ X                       \|   .--. .--.   |/                       X │
    │ X                        | )/   | |   \( |                        X │
    │ X                        |/ \__/   \__/ \|                        X │
    │ X                        /      /^\      \                        X │
    │ X                        \__    '='    __/                        X │
    │ X                          |\         /|                          X │
    │ X                          |\''VUUUV''/|                          X │
    │ X                          \ `'''''''` /                          X │
    │ X                           `-._____.-'                           X │
    │ X                             / / \ \                             X │ 
    │ X                            / /   \ \                            X │
    │ X                           / /     \ \                           X │
    │ X                        ,-' (       ) `-,                        X │ 
    │ X                        `-'._)     (_.'-`                        X │ 
    │ X                                                                 X │
    │ X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X X │
    └─────────────────────────────────────────────────────────────────────┘\n";
}
//FIN DE CÓDIGO ~