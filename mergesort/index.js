let testArray = [4, 2, 6, 5, 2, 3, 10,  9];
let element = document.getElementById('result');
let result = mergesort(testArray);
element.innerText = result.toString();


function mergesort(testArray){

    if(testArray.length === 1) return testArray;

    let middle = Math.floor(testArray.length/2);
    let left = testArray.slice(0, middle);
    let right = testArray.slice(middle);

    return merge(
        mergesort(left),
        mergesort(right)
    );
}

function merge(left, right){
    let resultArr = [];
    let leftIndex = 0;
    let rightIndex = 0;

    while(left.length && right.length){
        if(left[leftIndex] < right[rightIndex]){
            resultArr.push(left.shift())
        }else{
            resultArr.push(right.shift())
        }
    }

    while(left.length){
        resultArr.push(left.shift());
    }

    while(right.length){
        resultArr.push(right.shift());
    }

    return resultArr;

}