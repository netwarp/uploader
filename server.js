const app = require('express')();
const server = require('http').Server(app);
const io = require('socket.io')(server);
const redis = require('redis');
const client = redis.createClient();


var ffmpeg = require('fluent-ffmpeg');

var sub = redis.createClient(), pub = redis.createClient();
var msg_count = 0;

var listProgress = new Map();

function convertVideo(id, input, output) {
    ffmpeg()
        .input(input)
        .output(output)
        .on('start', (cmd) => {
            console.log('start');
            console.log(cmd)
        })
        .on('progress', (progress) => {
          //  console.log('_____________')
            //console.log(progress)
          //  console.log('id = ' + id)
          listProgress.set(id, progress.percent);

          console.log(listProgress);
          io.emit('response_converting', listProgress);

        })
        .on('data',(chunk) => {
            console.log(chunk);
            console.log('@@@@@@@');
        })
        .on('stderr', (stderrLine) => {
            console.log(stderrLine);
        })
        .on('codecData', (data) => {
            console.log(data);
        })
        .on('end', () => {
            console.log('end')
        })
        .on('error', (error) => {
            console.log(error)
        })
        .run()
}

sub.on('message', function(channel, message) {

    var message = JSON.parse(message);
    var id = message.id;
    var input = `./storage/app/${message.path}/${message.public_id}.${message.extension}`;
    var output = `./storage/app/${message.path}/${message.public_id}.webm`;

    console.log(input);
    console.log(output);

    convertVideo(id, input, output)

});
sub.subscribe('converter');

app.get('/', function (req, res) {
    res.status(200).json({foo: 'bar'})
});

app.post('/', (req, res) => {
    res.status(200).json({foo: 'bar'})
});

io.on('connection', (socket) => {

    socket.on('request_converting', () => {
        socket.emit('response_converting', listProgress)
    });

    socket.emit('hello', 'hello')
});

server.listen(8080);
