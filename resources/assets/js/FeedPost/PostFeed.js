var FeedPost = React.createClass({
    componentWillMount: function(){
        this.loadDataFromRedis();
        setInterval(this.loadDataFromRedis, 1000);
    },
    loadDataFromRedis: function(dataGet){
        var io = require('socket.io-client');
        var socket = io();
        socket.on('update-feed:FeedPosted', function(dataGet){
            console.log(dataGet);
            this.user.push(dataGet.user);
            this.date.push(dataGet.date);
            this.text.push(dataGet.text);
        });
    },
    render: function(){
        var createFeed = function(dataGet){
            return (
                <div className="panel panel-default">
                    <div className="panel-body">
                        <h1><a href="">{dataGet.user}</a></h1>
                        <span className="">{dataGet.date}</span>
                            <div className="newsFeedContent">
                            {dataGet.text}
                            </div>
                    </div>
                </div>
            );
        };
        return(
                <div>
                    {this.props.feed.map(createFeed)}
                </div>
            );
    }
});

var FeedInput = React.createClass({
        getInitialState: function(){
            return{
                text: '',
                feed: []
            };
        },
        onChange: function(e){
            this.setState({text: e.target.value});
        },
        handleSubmit: function(e){
            e.preventDefault();
            if(this.state.text === "") return;
            var nextFeed = this.state.feed.concat([this.state.text]);
            var nextText = '';
            this.setState({feed: nextFeed, text: nextText});
            this.saveDataToRedis();
        },
        saveDataToRedis: function(){
            var user = document.getElementById('user-name').getAttribute('username');
            var token = document.querySelector('[name="_token"]').getAttribute('value');
            var newsFeed = {
                "_token": token,
                "user": user,
                "text": this.state.text,
                "time": new Date(),

            };
            //
           $.ajax({
                type: "POST",
                url: "feed",
                data: newsFeed,
                dataType: "json",
                success: function(data){
                console.log('Your Post was successful');
                }
           });
        },
        render: function(){
        return (
            <div className="col-md-6">
                <div className="panel panel-default">
                    <div className="panel-body">
                        <form className="form-horizontal" onSubmit={this.handleSubmit}>
                            <textarea onChange={this.onChange} value={this.state.text} className="form-control update-form" placeholder="Tell us what you been up to..." name="update" cols="50" row="10"></textarea>
                            <button className="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <FeedPost feed={this.state.feed} />
            </div>

            );
        }

});
React.render(<FeedInput />, document.getElementById('FeedInput'));


