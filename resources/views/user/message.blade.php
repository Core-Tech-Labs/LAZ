@extends('master')

@section('title', 'Messages')
@section('content')
<div id="usr" username="{{Auth::user()->username}}"></div>
{{-- <script text="text/javascript" src="{{ asset('/js/im.js') }}"></script> --}}
<script>
var IM = {
  connection: null,

  jid_to_id: function(jid){
    return Strophe.getBareJidFromJid(jid)
        .replace("@", "-")
        .replace(".", "-");
  }
};

$(document).ready(function(ev, data){
  var user = document.getElementById('usr').getAttribute('username');
  var conn = new Strophe.Connection('http://ctl.dev:5280/http-bind/');

//      For registering
//       var callback = function (status) {
//     if (status === Strophe.Status.REGISTER) {

//         conn.register.fields.username = user;
//         conn.register.fields.password = "password";
//         conn.register.submit();
//         console.log('Registered '+user);
//     } else if (status === Strophe.Status.REGISTERED) {
//         console.log("registered!");
//         // calling login will authenticate the registered JID.
//         // conn.authenticate();
//     } else if (status === Strophe.Status.CONFLICT) {
//         console.log("Contact already existed!");
//     } else if (status === Strophe.Status.NOTACCEPTABLE) {
//         console.log("Registration form not properly filled out.")
//     } else if (status === Strophe.Status.REGIFAIL) {
//         console.log("The Server does not support In-Band Registration")
//     } else if (status === Strophe.Status.CONNECTED) {
//        console.log('connected');
//        $(document).trigger('connected');
//     }else if(status === Strophe.Status.DISCONNECTED){
//       $(document).trigger('disconnected');
//     }
// };
// if(!conn){
//   conn.rawInput = rawInput;
//   conn.rawOutput = rawOutput;
// }
// console.log(conn);
// conn.register.connect('localhost', callback, 60, 1);

  conn.connect('Rudyj@localhost', 'password', function(status){
    if(status === Strophe.Status.CONNECTED){
      $(document).trigger('connected');
    } else if(status === Strophe.Status.DISCONNECTED){
      $(document).trigger('disconnected');
    }
  });

  IM.connection = conn;
});

$(document).bind('connected', function(){
  var iq = $iq({type: 'get'}).c('query', {xmlns: 'jabber:iq:roster'});
  conn.sendIQ(iq, IM.rosterCallback);
  console.log('sentIQ');
});

$(document).ready(function(){
  var iq = $iq({type: 'get'}).c('query', {xmlns: 'jabber:iq:roster'});
  IM.connection.sendIQ(iq, IM.rosterCallback);
  console.log('sentIQ');
});

$(document).bind('disconnected', function(){

});

  function rosterCallback(iq) {
  $(iq).find('item').each(function() {
    var jid = $(this).getAttribute('jid'); // The jabber_id of your contact
    var name = $(this).getAttribute('name') || jid;

    var contact = $("<li class='media' id='message-comestics' style='background:#eee;'> "+
                    "<div class='media-left' >"+
                      "<img class='media-object img-circle' id='user-dp' src='' alt='' ></div>"+
                    "</div><div class='media-body' "+
                      "<h4 class='media-heading'>"+name+"</h4>"+
                    "</div></li>");
      IM.insert_contact(contact);
  });
  // conn.addHandler(onPresence, null, 'iq');
  // conn.send($pres());
};



function presence_value(elem){
  if(elem.hasClass('online')){
    return 2;
  }else if(elem.hasClass('away')){
    return 1;
  }
  return 0;
};

function insert_contact(elem) {
   var jid = elem.find('.roster-jid').text();
   var pres = IM.presence_value(elem.find('.roster-contact'));

   var contacts = $('#roster li');

   if (contacts.length > 0) {
    var inserted = false;
    contacts.each(function () {
      var cmp_pres = IM.presence_value(
       $(this).find('.roster-contact'));
       var cmp_jid = $(this).find('.roster-jid').text();

       if (pres > cmp_pres) {
         $(this).before(elem);

         inserted = true;
         return false;
       } else {
       if (jid < cmp_jid) {
         $(this).before(elem);
         inserted = true;
         return false;
        }

       }
    });
      if (!inserted) {
        $('#roster ul').append(elem);
     }
   } else {
    $('#roster ul').append(elem);
   }
};



</script>




{{--
<div id="MessageBase"></div>
<script text="text/javascript" src="{{ asset('/js/message.js') }}"></script>--}}





<div class="container-fluid padding-top padding">
    <div class="panel panel-default">
      <div class="row">

        <div class="col-md-4" id="padding">

          {{-- Users list --}}
          <a href="{{ url('#') }}">
            <div id="roster">
              <ul></ul>
            </div>
            {{-- <div class="media" id="message-comestics" style="background:#eee;">
              <div class="media-left">
                  <img class="media-object img-circle" id="user-dp" src="{{ asset('/imgs/default-dp.jpg') }}" alt="...">
              </div>
              <div class="media-body">
                <h4 class="media-heading">Users Name</h4>
                ...
              </div>
            </div> --}}
          </a>

        </div>


        <div class="col-md-8" id="padding">
          <div class="panel panel-default" id="msg-padding">
            <ul></ul>
            {{-- <div class="well well-sm" id="msg"></div> --}}
          </div>
          <form onload="this.sendChat()">
            <textarea class="form-control update-msg" placeholder="..." name="update" cols="50" rows="10"></textarea>
            <button class="btn btn-success" id="update-msg-button" type="submit">Send</button>
          </form>
        </div>

      </div>
    </div>
</div>



@endsection
