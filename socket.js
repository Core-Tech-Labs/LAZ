var server = require('http').Server();
var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();


redis.subscribe('update-feed');


redis.on('feed', function(channel, feed){
  console.log('Message received' +feed);
  feed = JSON.parse(feed);

  io.emit(channel + ':' + feed.text, feed.dataPost);
});

server.listen(3000, function(){
  console.log('Connection Successful');
});