process.stdin.resume();
process.stdin.setEncoding('ascii');

var input_stdin = "";
var input_stdin_array = "";
var input_currentline = 0;

process.stdin.on('data', function (data) {
    input_stdin += data;
});

process.stdin.on('end', function () {
    input_stdin_array = input_stdin.split("\n");
    main();    
});

function readLine() {
    return input_stdin_array[input_currentline++];
}

/////////////// ignore above this line ////////////////////

function staircase(n) {
    // Complete this function
    var result = "";
    for(var i = 0; i < n; i++) {
        for(var j = n; j > i+1; j--) {
            process.stdout.write(" ");
        }
        for(var k = 0; k < i+1; k++) {
            process.stdout.write("#");
        }
        console.log("");
    }
}

function main() {
    var n = parseInt(readLine());
    staircase(n);

}