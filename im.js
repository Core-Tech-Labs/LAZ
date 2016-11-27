var strophe = require("node-strophe").Strophe;
var IM = strophe.Strophe;

var connection = new IM.Connection('/http-bind/');
connection.connect('jid', 'password');
