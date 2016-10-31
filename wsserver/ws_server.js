#!/usr/bin/env node

//This WebSocket server is just a testing endpoint.
//It echoes incoming text as they come in.
//This code was adapted from this sample:
//  http://cjihrig.com/blog/creating-your-own-node-js-websocket-echo-server/
// Usage:  node ws_server.js [ port ]

var WebSocketServer = require('websocket').server;
var http = require('http');

// process arguments - user supplied port number?
var PORT;
var myArgs = process.argv.slice(2);
if (myArgs.length >= 1) {
  PORT = myArgs[0];
}
PORT = PORT || 8081;

var server = http.createServer(function(request, response) {
console.log((new Date().toISOString()) + ' Received request for ' + request.url);
response.writeHead(404);
response.end();
});

server.listen(PORT, function() {
  console.log((new Date().toISOString()) + '  I live to serve. port = ' + PORT + '  (Ctrl-C to quit )');
});

wsServer = new WebSocketServer({httpServer: server, autoAcceptConnections: false});

function originIsAllowed(origin) {
  return true;
}

wsServer.on('request', function(request) {
  if (!originIsAllowed(request.origin)) {
    //only accept requests from allowed origins
    request.reject();
    console.log((new Date().toISOString()) + ' Connection from origin ' + request.origin + ' rejected.');
    return;
  }

  var connection = request.accept('echo-protocol', request.origin);
  connection.on('message', function(message) {
    if (message.type === 'utf8') {
      console.log('Received: ' + message.utf8Data);
      var rsp = message.utf8Data;
      if (rsp.toLowerCase().startsWith("marco"))
        rsp = new Date().toISOString() + "&nbsp;&nbsp;&nbsp;&nbsp;Polo!";
      else
        rsp = new Date().toISOString() + '&nbsp;&nbsp;&nbsp;&nbsp;You said: ' +  rsp;
      connection.sendUTF(rsp);
    }
    else if (message.type === 'binary') {
      console.log('Received Binary Message of ' + message.binaryData.length + ' bytes');
      connection.sendBytes(message.binaryData);
    }
  });

  connection.on('close', function(reasonCode, description) {
    console.log((new Date().toISOString()) + ' Peer ' + connection.remoteAddress + ' disconnected.');
  });
});
