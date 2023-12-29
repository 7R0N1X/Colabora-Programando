const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 8080 });

// Almacenamiento temporal de los datos de las salas
const salas = {};

wss.on('listening', function () {
  console.log(`Servidor WebSocket corriendo en el puerto ${wss.options.port}`);
});

wss.on('connection', function connection(ws) {
  ws.on('message', function incoming(message) {
    const data = JSON.parse(message);
    const { sala, contenido } = data;

    // Almacenar el contenido de la sala
    salas[sala] = contenido;

    // Enviar actualización a todos los clientes en esa sala
    wss.clients.forEach(function each(client) {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(JSON.stringify({ sala, contenido }));
      }
    });
  });
});
