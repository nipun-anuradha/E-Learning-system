function adminLogin() {
    var mail = document.getElementById("mail");
    var pass = document.getElementById("pw");
    var rem = document.getElementById("rem");

    var form = new FormData();
    form.append("m", mail.value);
    form.append("p", pass.value);
    form.append("r", rem.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminLoginProcess.php", true);
    r.send(form);
}

function adminlogOut(){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    }
    r.open("GET", "logOutProcess.php", true);
    r.send();
    
}

function loadDetails(cid){
    var div = document.getElementById("details");
    var course = document.getElementById("course");

    var sname = course.options[course.selectedIndex].text;


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var content = "<h5>Subject Name: "+sname+"</h5><h6>Subject Id: "+cid+"</h6><h6>Teachers: "+t+"</h6>";
            div.innerHTML = content;
        }
    }
    r.open("GET", "loadCourseDetailProcess.php?cid="+cid, true);
    r.send();
}

function teacherState(state, id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
               location.reload();
            }
        }
    }
    r.open("GET", "teacherStateProcess.php?s="+state+"&id="+id, true);
    r.send();
}

function studentState(state, id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            location.reload();
        }
    }
    r.open("GET", "studentStateProcess.php?s="+state+"&id="+id, true);
    r.send();
}

function showModel(){
    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
    myModal.show();
}

function addCourse(){
    var name = document.getElementById("cname");
    var des = document.getElementById("des");

    var form = new FormData();
    form.append("n", name.value);
    form.append("d", des.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                name.value = '';
                des.value = '';
                location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addCourseProcess.php", true);
    r.send(form);
}