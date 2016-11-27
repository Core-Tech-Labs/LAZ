var strophe = require('strophe.js');
var register = require('strophejs-plugins/register/strophe.register.js');
// var roster = require('strophejs-plugins/roster/strophe.roster.js');

$(document).ready(function(){

var user = document.getElementById('usr').getAttribute('username');
var conn = new Strophe.Connection('http://ctl.dev:5280/http-bind/');
conn.addProtocolErrorHandler('HTTP', 500, onError);
function onError(err_code){
    console.log(err_code);
}

conn.connect('Rudyj@localhost', 'password');
// console.log(conn);

function getRoster() {
  console.log('getRoster');
  var iq = $iq({
    type: 'get'
  }).c('query', {
    xmlns: 'jabber:iq:roster'
  });
  console.log(iq);
  conn.sendIQ(iq, rosterCallback);
}

function rosterCallback(iq) {
  console.log('rosterCallback:');
  $(iq).find('item').each(function() {
    var jid = $(this).getAttribute('jid'); // The jabber_id of your contact
    // You can probably put them in a unordered list and and use their jids as ids.
    $('#biscrim').children('ul').append('<li id="'+jid+'">'+jid+'</li>')
    console.log(' >' + jid);
  });
  conn.addHandler(onPresence, null, 'iq');
  conn.send($pres());
}

function onPresence(presence){
  var presence_type = $(presence).attr('type'); // unavailable, subscribed, etc...
  var from = $(presence).attr('from'); // the jabber_id of the contact
  if (presence_type != 'error'){
    if (presence_type === 'unavailable'){
      // Mark contact as offline
      console.log('error');
    }else{
      var show = $(presence).find("show").text(); // this is what gives away, dnd, etc.
      if (show === 'chat' || show === ''){
        // Mark contact as online
      }else{
        // etc...
      }
    }
  }
  return true;
  }

// var callback = function (status) {
//     if (status === Strophe.Status.REGISTER) {
//         // fill out the fields

//         conn.register.fields.username = document.getElementById('usr').getAttribute('username');
//         conn.register.fields.password = "password";
//         conn.register.submit();
//         console.log('Registered '+user);
//     } else if (status === Strophe.Status.REGISTERED) {
//         console.log("registered!");
//         // calling login will authenticate the registered JID.
//         conn.authenticate();
//     } else if (status === Strophe.Status.CONFLICT) {
//         console.log("Contact already existed!");
//     } else if (status === Strophe.Status.NOTACCEPTABLE) {
//         console.log("Registration form not properly filled out.")
//     } else if (status === Strophe.Status.REGIFAIL) {
//         console.log("The Server does not support In-Band Registration")
//     } else if (status === Strophe.Status.CONNECTED) {
//        console.log('connected');
//        conn.send($pres());
//     }
// };
// if(!conn){
//   conn.rawInput = rawInput;
//   conn.rawOutput = rawOutput;
// }
// console.log(conn);
// conn.register.connect('localhost', callback, 60, 1);



// console.log(conn);

//Setting new user to logged in users roster

// var iq = $iq({type: "set", from:"Rudyj@localhost"}).c("query", {xmlns:"jabber:iq:roster"}).c("item", {jid: "juliet@localhost", name: "president"});
// conn.sendIQ(iq);

// var subscribe = $pres({to: "juliet@localhost", type:"subscribe"});
// conn.send(subscribe);

// function on_subscription_request(stanza)
// {
//     if(stanza.getAttribute("type") == "subscribe" && is_friend(stanza.getAttribute("from")))
//     {
//         // Send a 'subscribed' notification back to accept the incoming
//         // subscription request
//         conn.send($pres({ to: "juliet@example.com", type: "subscribed" }));
//     }
//     return true;
// }
// conn.addHandler(on_subscription_request, null, "presence", "subscribe");




// console.log(subscribe);


 }); //end $(document).ready()

