let resultElement = document.getElementById('result');
let arr = [4, 2, 6, 5, 3, 9];

function quickSort(items, left, right){
  if(items.length > 1){
    let index = partition(items, left, right);
    console.log(index);
    resultElement.innerHTML += items.toString()+'<br/>';
    if(left < index - 1){
      quickSort(items, left, index - 1);
    }

    if(index < right){
      quickSort(items, index, right);
    }

  }
  return items
} 

function partition(items, left, right){
  let pivot = items[Math.floor((left + right)/2)];
  let i = left, j = right;
  
  while(i<=j){
    while(items[i] < pivot){
      i++;
    } 
    
    while(items[j] > pivot){
      j--;
    }
    
    if(i<=j){
      swap(items, i, j);
      j--;
      i++;
    }
    
  }
  
  console.log("index returned",i);
  return i;
}

function swap(items, left, right){
  let temp = items[left];
  items[left] = items[right];
  items[right] = temp;
}

quickSort(arr, 0, arr.length  - 1);