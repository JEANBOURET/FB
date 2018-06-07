console.log(spiral(3));

function spiral(n){
    let matrix = [];
    for(let i=0; i<n; i++){
        matrix[i] = [];
        for(let j=0; j<n; j++){
            matrix[i][j] = null;
        }
    }
    console.log(matrix);

    let currentVal = 0;
    let direction = 0;
    let left = 0;
    let top = 0;
    let right = n-1;
    let bottom = n-1;
    let col = 0;
    let row = 0;

    while(currentVal < n*n){
        switch(direction%4){
            case 0:
                for(col=left; col<=right; col++){
                    matrix[top][col] = ++currentVal;
                }
                top++;
                direction++;
            break;
            case 1:
                for(row=top; row<=bottom; row++){
                    matrix[row][right] = ++currentVal;
                }
                right--;
                direction++;
            break;
            case 2:
                for(col=right; col>=left; col--){
                    matrix[bottom][col] = ++currentVal;
                }
                bottom--;
                direction++;
            break;
            case 3:
                for(row=bottom; row>=top; row--){
                    matrix[row][left] = ++currentVal;
                }
                left++;
                direction++;
            break;
        }
    }
    return matrix;
}
