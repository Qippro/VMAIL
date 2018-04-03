var express = require('express');


var app = express();
app.set('port', (process.env.PORT || 5000));



app.use(express.static('public'));


app.get('/request', function (req, res) {
    res.header('Access-Control-Allow-Origin', "*");
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type');
  
  var key_text=req.query.key;
	
	var NodeRSA = require('node-rsa');
var key = new NodeRSA({b: 512});
var publicDer = key.exportKey('pkcs8-public');
var privateDer = key.exportKey('pkcs8-private');
console.log(publicDer)
console.log(privateDer)
var text = key_text;
console.log(key.getKeySize())
var encrypted = key.encrypt(text, 'base64');
console.log('encrypted: ', encrypted);
var decrypted = key.decrypt(encrypted, 'utf8');
console.log('decrypted: ', decrypted);
response = {		// Prepare output in JSON format
	text:text,
	encryp:encrypted,
	decr:decrypted 	};

res.end(JSON.stringify(response));
})


app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
})