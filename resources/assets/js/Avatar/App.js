import React from "react";
import AvatarCropper from "./AvatarCropper";
import {
  Modal,
  Button
} from "react-bootstrap";

var App = React.createClass({
  getInitialState: function() {
    return {
      cropperOpen: false,
      img: null,
      croppedImg: "https://s3.amazonaws.com/test-laz/default-dp.jpg"
    };
  },
  handleFileChange: function(dataURI) {
    this.setState({
      img: dataURI,
      croppedImg: this.state.croppedImg,
      cropperOpen: true
    });
  },
  handleCrop: function(dataURI) {
    this.setState({
      cropperOpen: false,
      img: null,
      croppedImg: dataURI
    });
  },
  handleRequestHide: function() {
    this.setState({
      cropperOpen: false
    });
  },
  render () {
    return (
      <div>
        <div className="avatar-photo img-circle">
          <FileUpload handleFileChange={this.handleFileChange} />
          <div className="avatar-edit">
            <span>Click to Pick Avatar
            <i className="fa fa-camera"></i>
            </span>
          </div>
          <img src={this.state.croppedImg} />
        </div>
        {this.state.cropperOpen &&
          <AvatarCropper
            onHide={this.handleRequestHide}
            onCrop={this.handleCrop}
            image={this.state.img}
            width={450}
            height={450}
          />
        }
      </div>
    );
  }
});
//
//
var FileUpload = React.createClass({

  handleFile: function(e) {
    var reader = new FileReader();
    var file = e.target.files[0];

    if (!file) return;

    reader.onload = function(img) {
      React.findDOMNode(this.refs.in).value = '';
      this.props.handleFileChange(img.target.result);
    }.bind(this);
    reader.readAsDataURL(file);
  },
  render: function() {
    return (
      <input ref="in" type="file" accept="image/*" action="images/dpUpload" onChange={this.handleFile} />
    );
  }
});

React.render(<App />, document.getElementById("content"));
