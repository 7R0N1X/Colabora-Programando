// Espera a que el DOM esté completamente cargado antes de ejecutar el código
document.addEventListener('DOMContentLoaded', function () {
    
    // Inicializa el editor CodeMirror en el textarea con id "codigo"
    var editor = CodeMirror.fromTextArea(document.getElementById("codigo"), {
        lineNumbers: true,
        mode: "javascript",
        theme: "dracula"
    });

    var typingTimer; // Variable para el temporizador de escritura
    var doneTypingInterval = 2000; // Intervalo de tiempo después de que se detiene la escritura

    // Función para enviar el contenido al servidor WebSocket
    function enviarContenido(ws) {
        const contenido = editor.getValue(); // Obtiene el contenido del editor
        const data = {
            sala: "<?php echo isset($codigo_sala) ? $codigo_sala : '' ?>", // Sala identificada por PHP
            contenido: contenido // Contenido del editor a enviar
        };
        ws.send(JSON.stringify(data)); // Envía los datos al servidor como cadena JSON
    }

    // Evento que se dispara al realizar cambios en el editor CodeMirror
    editor.on('change', function () {
        clearTimeout(typingTimer); // Limpia el temporizador antes de establecer uno nuevo
        typingTimer = setTimeout(function () {
            // Cuando se detiene la escritura, se establece una nueva conexión WebSocket
            const ws = new WebSocket('ws://localhost:8080');

            ws.onopen = function () {
                console.log('Conexión WebSocket establecida');
                enviarContenido(ws); // Enviar el contenido al servidor después de un cierto tiempo
            };

            ws.onerror = function (error) {
                console.error('Error de WebSocket:', error);
            };
        }, doneTypingInterval); // Establece el tiempo de espera después de la escritura
    });

    // Establecer una conexión WebSocket al cargar la página
    const ws = new WebSocket('ws://localhost:8080');

    ws.onopen = function () {
        console.log('Conexión WebSocket establecida');
    };

    ws.onerror = function (error) {
        console.error('Error de WebSocket:', error);
    };

    // Manejar las actualizaciones recibidas desde el servidor WebSocket
    ws.onmessage = function (event) {
        const data = JSON.parse(event.data); // Analiza los datos recibidos como JSON
        if (data.sala === "<?php echo isset($codigo_sala) ? $codigo_sala : '' ?>") {
            editor.setValue(data.contenido); // Establece el contenido del editor con los datos recibidos
        }
    };
});
