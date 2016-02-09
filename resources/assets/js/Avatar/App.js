import React from "react";
import ReactDom from "react-dom";
import AvatarCropper from "./AvatarCropper";

var App = React.createClass({
  getInitialState: function() {
    var defaultProfile = document.getElementById('user-dp').getAttribute('profileimage');
    return {
      cropperOpen: false,
      img: null,
      croppedImg: defaultProfile
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
  saveImageToServer: function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "images/dpUpload",
        data: this.state.croppedImg,
        dataType: "json",
        error: function(){
          alert('Error in Uploading');
        },
        success: function(){
          console.log('Success');
          alert('Image File'.this.state.croppedImg);
        }
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
        <div className="avatar-photo">
          <FileUpload handleFileChange={this.handleFileChange} />
          <div className="avatar-edit">
            <span>Click to Pick Avatar</span>
            <i className="fa fa-camera"></i>
          </div>
          <img src={this.state.croppedImg} />
        </div>
        {this.state.cropperOpen &&
          <AvatarCropper
            onRequestHide={this.handleRequestHide}
            cropperOpen={this.state.cropperOpen}
            onCrop={this.handleCrop}
            image={this.state.img}
            width={450}
            height={450}
            onSave={this.saveImageToServer}
          />
        }
      </div>
  }
});

var FileUpload = React.createClass({

  handleFile: function(e) {
    var reader = new FileReader();
    var file = e.target.files[0];

    if (!file) return;

    reader.onload = function(img) {
      ReactDom.findDOMNode(this.refs.in).value = '';
      this.props.handleFileChange(img.target.result);
    }.bind(this);
    reader.readAsDataURL(file);
  },

  render: function() {
    return (
      <input ref="in" type="file" accept="image/*" onChange={this.handleFile} />
    );
  }
});

ReactDom.render(<App />, document.getElementById("content"));
