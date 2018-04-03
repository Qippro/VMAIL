var http = require('http');
console.log("SERVER LISTENING TO PORT 8080");
http.createServer(function (req, res) {
  
  res.writeHead(200, {'Content-Type': 'text/plain'});
  res.write('Hello World!');
  res.end();
}).listen(8080);

