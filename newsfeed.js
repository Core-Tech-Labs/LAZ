/**
 * Usage for NewsFeed Real time
 *
 */
var server = require('http').Server();
var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('update-feed');

server.listen(3000, function(){
  console.log('Connection Successful');
});


redis.on('message', function(channel, message){
  message = JSON.parse(message);
  console.log(message, channel);
  io.emit(channel + ':' + message.event, message.data);
});