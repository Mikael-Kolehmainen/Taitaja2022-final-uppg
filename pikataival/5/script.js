// Toteuta tähän tarvittava koodi
var myArray = ["testi", "testi", "testii", "test"];

let uniqueElements = myArray.filter((element, index) => {
    return myArray.indexOf(element) === index;
});

console.log(uniqueElements);