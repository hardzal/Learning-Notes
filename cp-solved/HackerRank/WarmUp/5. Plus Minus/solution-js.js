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

function plusMinus(arr) {
    // Complete this function
    let positive, negative, zero;
    positive = 0;
    negative = 0;
    zero = 0;
    for(let i = 0; i < arr.length; i++) {
        if(arr[i] == 0) {
            zero += 1;
        }  else {
            if(arr[i] > 0) {
                positive += 1;
            } else {
                negative += 1;
            }
        }
    }
    console.log(positive/arr.length);
    console.log(negative/arr.length);
    console.log(zero/arr.length);
}

function main() {
    var n = parseInt(readLine());
    arr = readLine().split(' ');
    arr = arr.map(Number);
    plusMinus(arr);

}