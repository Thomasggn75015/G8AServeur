function control_CB(form){
    var check_coach_yes = document.getElementById('check_coach_yes');
    var check_coach_no = document.getElementById('check_coach_no');
    var check_coach_iam = document.getElementById('check_coach_iam');
    var readonlyField = document.getElementById('coach');
    var role_utilisateur = document.getElementById('role_user');
    
    
    if(check_coach_yes.checked == true){
        readonlyField.disabled = false;
        role_utilisateur.value = "sportif";
    }
    else if(check_coach_no.checked == true){
        readonlyField.value = "NOCOACH";
        role_utilisateur.value = "sportif";
        readonlyField.disabled = true;
    }
    else if(check_coach_iam.checked == true){
        readonlyField.value = "NOCOACH";
        role_utilisateur.value = "coach";
        readonlyField.disabled = true;
        coach_enregistre.value = readonlyField.value;
    }
    else{
        readonlyField.disabled = true;
        readonlyField.value = "NOCOACH";
        role_utilisateur.value = "null";
    }

    
    //alert(coach_enregistre.value)
}

function definition_coach(){
    var readonlyField = document.getElementById('coach');
    var coach_enregistre = document.getElementById('store_coach')
    coach_enregistre.value = readonlyField.value;
}