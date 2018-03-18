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

function diagonalDifference(a) {
    // Complete this function
    var result, temp1, temp2, x, y;
    temp1 = 0;
    temp2 = 0;
    for(i = 0; i < a.length; i++) {
        temp1 = temp1 + a[i][i];
    }
    y = a.length-1;
    for(i = 0; i < a.length; i++) {
        temp2 = temp2 + a[i][y];
        y--;
    }
    result = Math.abs(temp1 - temp2);
    return result;
}

function main() {
    var n = parseInt(readLine());
    var a = [];
    for(a_i = 0; a_i < n; a_i++){
       a[a_i] = readLine().split(' ');
       a[a_i] = a[a_i].map(Number);
    }
    var result = diagonalDifference(a);
    process.stdout.write("" + result + "\n");

}