
document.getElementById("submit").addEventListener('click',checkFields);
function checkFields(e){
    var nums = document.getElementsByClassName("numRec");
    console.log(nums);
    for(i = 0; i < nums.length; i++){
        let element = nums.item(i);
        if(isNaN(element.value)){
            alert(element.id +" needs to be a number!");
            e.preventDefault();
        }
    }

    var dates = document.getElementsByClassName("dateRec");
    for(i = 0; i < dates.length; i++){
        let element = dates[i];
        let values = element.value.split('-');
        if(!(values[0]>0 && values[0] < 32)){
            alert(element.id+" needs to be a date in uk format!");
            e.preventDefault();
        }else if(!(values[1]>0 && values[1] < 13)){
            alert(element.id+" needs to be a date in uk format!");
            e.preventDefault();
        }
    }
}