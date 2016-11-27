import React from "react";
import ReactDOM from "react-dom";
import strophe from "strophe.js";
import roster from "strophejs-plugins/roster/strophe.roster.js";
import $ from 'jquery';

let conn = new Strophe.Connection('http://ctl.dev:5280/http-bind/');


var MessageBase = React.createClass({
  loadMessageFromAMQ: function(){
    // var auth = document.getElementById('usr').getAttribute('username');
  // Node components needed amqp and redis

  },
  saveMessageToAMQ: function(msg){
    var msgtxt = this.state.msg; // empty array
    msg.id = Date.now();
    var newMsg = msgtxt.concat([msg]); // looks like the best var
    this.setState({msg: newMsg});

    var username = document.getElementById('usr').getAttribute('username');
    $.ajax({
      type: 'GET',
      url: '/message/'+username,
      data: this.props.text, // need fixing
      success: function(){
        console.log('Success'),
        console.log(this.state.text),
        console.log('/message/'+username)
      }.bind(this),
      error: function(xhr, status, err) {
        console.log(status, err.toString());
      }
    });
  },
  /*Roster Use*/
  getRoster: function(roster, rosterCallback){
    // var user = document.getElementById('usr').getAttribute('username');
    conn.addProtocolErrorHandler('HTTP', 500, onError);
    function onError(err_code){console.log(err_code);}

    conn.connect('Rudyj@localhost', 'password');
    var iq = $iq({type: 'get', from: 'Rudyj@localhost', id: 'roster_1'}).c('query', {xmlns: 'jabber:iq:roster', ver: 'ver1'});
    conn.sendIQ(iq, rosterCallback);
  },
  rosterCallback: function(iq){
    console.log('rosterCallback:');
    $(iq).find('item').each(function() {
    var jid = $(this).getAttribute('jid');
      $('#biscrim').children('ul').append('<li id="'+jid+'">'+jid+'</li>')
    // console.log(jid);
  });
    conn.addHandler(this.onPresence(), null, 'presence');
  },
  onPresence: function(presence){
    var presence_type = $(presence).attr('type'); // unavailable, subscribed, etc...
    var frm = $(presence).attr('from'); // the jabber_id of the contact
  if (presence_type != 'error'){
    if (presence_type === 'unavailable'){
      // Mark contact as offline
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
  },
  /*Above is for Roster Use*/
  getInitialState: function(){
    return{
      msg: [],
      roster: [],
    }
  },
  componentDidMount: function(){
    this.getRoster();
    this.rosterCallback();
    this.loadMessageFromAMQ();
    setInterval(this.loadMessageFromAMQ, 5000);
  },
  render: function(){
    return(
        <div className="container-fluid padding-top padding">
          <div className="panel panel-default">
            <div className="row">

              <div className="col-md-4" id="padding">

                <Roster roster={this.state.roster}/>

              </div>

              <div className="col-md-8" id="padding">
                <div className="panel panel-default" id="msg-padding">
                  <Msg className="well well-sm" id="msg"  msg={this.state.msg} />
                </div>
                <MessageForm onMessageSubmit={this.saveMessageToAMQ}/>
              </div>

            </div>
          </div>
        </div>
      );
  }
});
var Roster = React.createClass({
  render: function(){
    var rosterName = this.props.roster.map(function(roster){
      return(
          <div key={roster.id} className="media" id="message-comestics">

            <div className="media-left">
              <img className="media-object img-circle" id="user-dp" src="{roster.img}" alt="{roster.name}"/>
            </div>

            <div className="media-body">
              <h4 className="media-heading">{roster.name}</h4>
              <p>{roster.pre}</p>
            </div>

          </div>
      )
    });
    return(
        <a href="#" >
          {rosterName}
        </a>
    );
  }
});

var Msg = React.createClass({

  render: function(){
    var createMsg = this.props.msg.map(function(msg){
      return(
            <li key={msg.id}>{msg.text}</li>
         )
        });
    return(
      <div className="baseMsg">
        <ul className="msg-list" >
          {createMsg}
        </ul>
      </div>
    );
  }
});


// May create a MessageList React.createClass

var MessageForm = React.createClass({
  getInitialState: function(){
    return{
      text: '',
    }
  },
  onChange: function(e){
    this.setState({text: e.target.value});
  },
  handleSubmit: function(e){
    e.preventDefault();
    var text = this.state.text.trim();
    this.props.onMessageSubmit({text: text})
    this.setState({text: ''});
  },
  render: function() {
  return (
      <form onSubmit={this.handleSubmit}>
        <textarea
          className="form-control update-msg"
          value={this.state.text}
          onChange={this.onChange}
          placeholder="Type Message here..."
          name="update"
          cols="50"
          rows="10">
        </textarea>
        <button className="btn btn-success" id="update-msg-button" type="submit" value="submit">Send</button>
      </form>
    );
  }
});

ReactDOM.render(<MessageBase />, document.getElementById('MessageBase'));