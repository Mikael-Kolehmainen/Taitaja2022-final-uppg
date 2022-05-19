// Toteuta tähän tarvittava koodi
var myArr = ["Taitaja", "Pori"];

console.log(countElementLength(myArr));

function countElementLength(array) {
    var elementCountArr = [];
    for (var i = 0; i < array.length; i++) {
        elementCountArr.push(array[i].length);
    }
    return elementCountArr;
}