console.log(spiral(4));

function spiral(n){
    // creating a matrix
    let matrix = [[]];
    for(let i=0; i<n; i++){
        matrix[i] = [];
        for(let j=0; j<n; j++){
            matrix[i][j] = null;
        }
    }

    // set initial value
    let currentValue = 0;
    let direction = 0;
    let col = 0, row = 0;
    let left = 0, 
        right = n-1, 
        top = 0, 
        bottom = n-1;

    while(currentValue < n*n){
        switch(direction%4){
            case 0:
                for(let col=left; col<=right; col++){
                    matrix[top][col] = ("0" + ++currentValue).slice(-n);
                }
                direction++;
                top++;
            break;
            case 1: 
                for(let row=top; row<=bottom; row++){
                    matrix[row][right] = ("0" + ++currentValue).slice(-n);
                }
                right--;
                direction++;
            break;
            case 2:
                for(let col=right; col>=left; col--){
                    matrix[bottom][col] = ("0" + ++currentValue).slice(-n);
                }
                bottom--;
                direction++;
            break;
            case 3:
                for(let row=bottom; row>=top; row--){
                    matrix[row][left] = ("0" + ++currentValue).slice(-n);
                }
                direction++;
                left++;
            break;
        }
    }

    return matrix;
}