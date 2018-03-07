//server.js
var http = require('http');

var server = http.createServer(function (request,response) {
    response.writeHead(200,{'Content-Type':'text/plain'});
    response.end('Hello World!!!');
}).listen(4000);

var redis = require('redis');
var redisclient = redis.createClient('6379','127.0.0.1');

var sub = function (c) {
    var c=  c || 'chatchannel';
    redisclient.subscribe(c,function (e) {
        console.log('subscribe channel:'+c);
    })
}
sub();

console.log('Server running at http://127.0.0.1:4000/');


var io = require('socket.io')(server);
io.on('connection', function(socket) {
    console.log('connection');
    //socket.emit('msgReceived', 'hello');
    redisclient.on('message',function (error,msg) {
        console.log('connection');
        console.log(msg);
        socket.emit('msgReceived', msg);
        //断开链接回调
        socket.on('disconnect',function (e) {
            console.log('socket disconnect:'+e);
        })
    })



})