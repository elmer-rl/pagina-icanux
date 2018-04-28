<?php return [
    /*
    Cada patrón de ruta está formada por un array de la forma

        [regexp, fichero, [array de parámetros extra]]

    Los subpatrones con nombre de la expresión regular son reemplazados
    en el nombre del fichero, y en los parámetros, encerrando el nombre
    del patrón entre llaves.
    */

    // Ajax
    ['^ajax/(?<app>.+?)$', 'ajax/{app}.php'],

    // Posts
    ['^post/(?<id>.+?)$', 'verpost.php'],

    // Postts????
    ['^postt/(?<id>.+?)$', 'veracuerdo.php'],

    // Perfil del usuario. No se por qué pasa 'nombre', habrá que
    // preguntarle a @elmer-rl :-D
    ['^perfil/(?<id>.+?)/(?<nombre>.+?)$', 'user/usuario.php'],

    // Si no existe ningún patrón de ruta especial, ubicamos un fichero
    // con el nombre de la ruta.
    ['^(?<app>.+?)/?$', '{app}.php'],

    // Este patrón es cuando la ruta está vacía, el equivalente a 'index.html'
    ['', 'inicio.php'],


];
