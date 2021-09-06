function formValidation(){

 let name = document.formAddEmployee.employee_Name;
 let IC = document.formAddEmployee.ic;

 if(checkIC(IC)){}

 return false;

 function checkIC(IC){
    var check = /^[0-9]{6}-*[0-9]{2}-*[0-9]{4}$/;
    if(IC.value.match(check)){
        return true;
    }else{
        alert('Invalid IC Number, please enter again.');
        IC.focus();
        return false;
    }

}

} //end formValidation

   