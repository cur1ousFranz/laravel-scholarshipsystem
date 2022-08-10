// This is for submission list table dynamic search
function searchApplicantList(){

    let input = document.getElementById('search-applicant-list');
    let searchValue = input.value.toLowerCase();
    let row = document.getElementsByClassName('tbl-row');

    for(let i=0; i<row.length; i++){
        let colObj = {};

        for(let j=3; j<=26; j++){
            let column = row[i].getElementsByTagName('td')[j];
            // storing current column text to object 'colObj'
            colObj[j] = column.textContent.toLowerCase();
        }

        if(colObj['3'].indexOf(searchValue) != -1 ||
        colObj['4'].indexOf(searchValue) != -1  ||
        colObj['5'].indexOf(searchValue) != -1  ||
        colObj['6'].indexOf(searchValue) != -1  ||
        colObj['7'].indexOf(searchValue) != -1  ||
        colObj['8'].indexOf(searchValue) != -1  ||
        colObj['9'].indexOf(searchValue) != -1  ||
        colObj['10'].indexOf(searchValue) != -1 ||
        colObj['11'].indexOf(searchValue) != -1 ||
        colObj['12'].indexOf(searchValue) != -1 ||
        colObj['13'].indexOf(searchValue) != -1 ||
        colObj['14'].indexOf(searchValue) != -1 ||
        colObj['15'].indexOf(searchValue) != -1 ||
        colObj['16'].indexOf(searchValue) != -1 ||
        colObj['17'].indexOf(searchValue) != -1 ||
        colObj['18'].indexOf(searchValue) != -1 ||
        colObj['19'].indexOf(searchValue) != -1 ||
        colObj['20'].indexOf(searchValue) != -1 ||
        colObj['21'].indexOf(searchValue) != -1 ||
        colObj['22'].indexOf(searchValue) != -1 ||
        colObj['23'].indexOf(searchValue) != -1 ||
        colObj['24'].indexOf(searchValue) != -1 ||
        colObj['25'].indexOf(searchValue) != -1 ||
        colObj['26'].indexOf(searchValue) != -1){

            row[i].style.display = '';
        }else{
            row[i].style.display = 'none';
        }

    }

}

// This is for qualified and rejected appicant list dynamic search

function searchApplicant(){

    let input = document.getElementById('search-applicant');
    let searchValue = input.value.toLowerCase();
    let row = document.getElementsByClassName('tbl-row');

    for(let i=0; i<row.length; i++){
        let colObj = {};

        for(let j=1; j<=24; j++){
            let column = row[i].getElementsByTagName('td')[j];
            // storing current column text to object 'colObj'
            colObj[j] = column.textContent.toLowerCase();
        }

        if(colObj['1'].indexOf(searchValue) != -1 ||
        colObj['2'].indexOf(searchValue) != -1  ||
        colObj['3'].indexOf(searchValue) != -1  ||
        colObj['4'].indexOf(searchValue) != -1  ||
        colObj['5'].indexOf(searchValue) != -1  ||
        colObj['6'].indexOf(searchValue) != -1  ||
        colObj['7'].indexOf(searchValue) != -1  ||
        colObj['8'].indexOf(searchValue) != -1 ||
        colObj['9'].indexOf(searchValue) != -1 ||
        colObj['10'].indexOf(searchValue) != -1 ||
        colObj['11'].indexOf(searchValue) != -1 ||
        colObj['12'].indexOf(searchValue) != -1 ||
        colObj['13'].indexOf(searchValue) != -1 ||
        colObj['14'].indexOf(searchValue) != -1 ||
        colObj['15'].indexOf(searchValue) != -1 ||
        colObj['16'].indexOf(searchValue) != -1 ||
        colObj['17'].indexOf(searchValue) != -1 ||
        colObj['18'].indexOf(searchValue) != -1 ||
        colObj['19'].indexOf(searchValue) != -1 ||
        colObj['20'].indexOf(searchValue) != -1 ||
        colObj['21'].indexOf(searchValue) != -1 ||
        colObj['22'].indexOf(searchValue) != -1 ||
        colObj['23'].indexOf(searchValue) != -1 ||
        colObj['24'].indexOf(searchValue) != -1){

            row[i].style.display = '';
        }else{
            row[i].style.display = 'none';
        }

    }

}
