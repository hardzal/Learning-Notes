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

function miniMaxSum(arr) {
    // Complete this function
    let aMax, aMin, temp, result;
    aMax = arr[0];
    aMin = arr[0];
    temp = 0;
    result = [];
    for(var i = 0; i < arr.length; i++) {
        if(arr[i] > aMax) aMax = arr[i];
        if(arr[i] < aMin) aMin = arr[i];
        
        temp += arr[i];
    }
    result[0] = temp - aMin;
    result[1] = temp - aMax;
    console.log(result[1] + " " + result[0]);
}

function main() {
    arr = readLine().split(' ');
    arr = arr.map(Number);
    miniMaxSum(arr);

}
