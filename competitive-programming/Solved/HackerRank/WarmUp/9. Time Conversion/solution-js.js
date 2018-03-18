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

function timeConversion(s) {
    // Complete this function
    let word = s.split(':');
    word[2].split();
    if((word[0] >= 0 && word[0] <= 12) && (word[1] >= 0 && word[1] <= 59) && (word[2][0] >= 0 && word[2][0] <= 5)) {
        if (word[2][2] + word[2][3] == "PM") {
            if(word[0] != 12) {
                word[0] = +word[0] + 12;
            } 
        }
        if(word[2][2] + word[2][3] == "AM") {
            if(word[0] == 12) {
                word[0] = "" + 0 + 0;
            }
        }
        return word[0] + ":" + word[1] + ":" + word[2][0] + word[2][1];
    }
}

function main() {
    var s = readLine();
    var result = timeConversion(s);
    process.stdout.write("" + result + "\n");

}