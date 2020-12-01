// toggle classes
transact = () =>{
    document.querySelector('.toggle1').classList.toggle('newtoggle1')
}
expenditure = () =>{
    document.querySelector('.toggle2').classList.toggle('newtoggle2')
}
income = () =>{
    document.querySelector('.toggle3').classList.toggle('newtoggle3')
}
expReport = () =>{
    document.querySelector('.toggle4').classList.toggle('newtoggle4')
}
incReport = () =>{
    document.querySelector('.toggle5').classList.toggle('newtoggle5')
}
budget = () =>{
    document.querySelector('.toggle6').classList.toggle('newtoggle6')
}
balance = () =>{
    document.querySelector('.toggle7').classList.toggle('newtoggle7')
}
category = () =>{
    document.querySelector('.toggle8').classList.toggle('newtoggle8')
}
// top bar toggle
toggle = () =>{
    document.querySelector('.nav-toggle').classList.toggle('newtoggle-nav')
}

//  calculator section
ac = () =>{
    let output = document.querySelector('#current');
    output.innerHTML = 0;
}
del = () =>{
    let output = document.querySelector('#current');
    output.innerHTML = output.innerHTML.substr(0,output.innerHTML.length- 1);
}
pow = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity' ) {
        output.innerHTML = '**';
    } 
    else {
        output.innerHTML += '**';
    }
}
divide = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity' ) {
        output.innerHTML = '/';
    } 
    else {
        output.innerHTML += '/';
    }
}
multiply = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity' ) {
        output.innerHTML = '*';
    } 
    else {
        output.innerHTML += '*';
    }
}
plus = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity' ) {
        output.innerHTML = '+';
    } 
    else {
        output.innerHTML += '+';
    }
}
minus = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity' ) {
        output.innerHTML = '-';
    } 
    else {
        output.innerHTML += '-';
    }
}
sqrt = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity' ) {
        output.innerHTML = Math.sqrt(output.innerHTML);
    } 
    else {
        output.innerHTML = Math.sqrt(output.innerHTML);
    }
}
equal = () =>{
    let output = document.querySelector('#current');
    output.innerHTML = eval(output.innerHTML).toLocaleString('en') ;
}







one = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 1;
    }
    else if (output.innerHTML == 1) {
        output.innerHTML += 1; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 1; 
    }
    else {
        output.innerHTML += 1;
    }
}
two = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 2;
    }
    else if (output.innerHTML == 2) {
        output.innerHTML += 2; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 2; 
    }
    else {
        output.innerHTML += 2;
    }
}
three = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 3;
    }
    else if (output.innerHTML == 3) {
        output.innerHTML += 3; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 3; 
    }
    else {
        output.innerHTML += 3;
    }
}
four = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 4;
    }
    else if (output.innerHTML == 4) {
        output.innerHTML += 4; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 4; 
    }
    else {
        output.innerHTML += 4;
    }
}
five = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 5;
    }
    else if (output.innerHTML == 5) {
        output.innerHTML += 5; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 5; 
    }
    else {
        output.innerHTML += 5;
    }
}
six = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 6;
    }
    else if (output.innerHTML == 6) {
        output.innerHTML += 6; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 6; 
    }
    else {
        output.innerHTML += 6;
    }
}
seven = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 7;
    }
    else if (output.innerHTML == 7) {
        output.innerHTML += 7; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 7; 
    }
    else {
        output.innerHTML += 7;
    }
}
eight = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 8;
    }
    else if (output.innerHTML == 8) {
        output.innerHTML += 8; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 8; 
    }
    else {
        output.innerHTML += 8;
    }
}
nine = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 9;
    }
    else if (output.innerHTML == 9) {
        output.innerHTML += 9; 
    }
    else if (output.innerHTML == 0) {
        output.innerHTML = 9; 
    }
    else {
        output.innerHTML += 9;
    }
}
zero = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = 0;
    }
    else {
        output.innerHTML += 0;
    }
}
point = () =>{
    let output = document.querySelector('#current');
    if (output.innerHTML == 'infinity') {
        output.innerHTML = '';
    }
    else if (output.innerHTML == '0') {
        output.innerHTML = '.'; 
    }
    else {
        output.innerHTML += '.';
    }
}

