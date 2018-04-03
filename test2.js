var express = require('express');
var app = express();

app.use(express.static('public'));


app.get('/test_req', function (req, res) {
// Prepare output in JSON format
res.header('Access-Control-Allow-Origin', "*");
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type');
  
response = {
};

'use strict';

// Use a Readline parser

const SerialPort = require('serialport');
const parsers = SerialPort.parsers;

// Use a `\r\n` as a line terminator
const parser = new parsers.Readline({ 
  delimiter: '\r\n'
});


const port = new SerialPort('COM5', {
  baudRate: 9600
});

port.pipe(parser);


port.on('open', () => console.log('Port open'));

parser.on('data', myfunc);

//parser.on('data', console.log);

 //set value to firebase ..push is used to generate a unique key

function myfunc(mesg)
{
response = {"id":mesg
};

  console.log(mesg);
  //console.log(response);
  if(response["id"][0]!='W')
    res.end(JSON.stringify(response));
  
}

})

var server = app.listen(8081, function () {
var host = server.address().address
var port = server.address().port

console.log("Server running at http://127.0.0.1:%s",port)
})