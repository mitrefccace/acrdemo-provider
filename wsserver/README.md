This folder is not required for the Provider portal.

This is a sample WebSocket server. It is used as a test endpoint.
It echoes incoming text as they come in.
This code was adapted from this sample:
  http://cjihrig.com/blog/creating-your-own-node-js-websocket-echo-server/
Usage:  node ws_server.js [ port ]


Installation:
- Install Node.js (on Windows... https://nodejs.org/en/).
- Clone this folder
- From Git Bash, run: npm install websocket (this will create node_modules)
- Run the server on the default port: node ws_server.js
- Run the server on a custom port: node ws_server.js 8082
