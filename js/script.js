//side navigation - student Dashboard
window.addEventListener("DOMContentLoaded", (event) => {
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});
//side navigation

var lFormStatus = "R";

function teacher() {
  if (lFormStatus == "L") {
    var lbox = document.getElementById("lbox");
    var rbox = document.getElementById("rbox");
    var l = document.getElementById("l");
    var r = document.getElementById("r");

    lbox.classList.toggle("d-none");
    rbox.classList.toggle("d-none");
    l.className = "text-black";
    r.className = "text-secondary";

    lFormStatus = "R";
  }
}

function asStudent() {
  var l = document.getElementById("l");
  var r = document.getElementById("r");
  var sbtn = document.getElementById("sbtn");
  var tbtn = document.getElementById("tbtn");
  var sregLink = document.getElementById("sr");
  var tregLink = document.getElementById("tr");

  l.className = "text-black";
  r.className = "text-secondary";

  sbtn.classList.remove("d-none");
  sregLink.classList.remove("d-none");
  tbtn.classList.add("d-none");
  tregLink.classList.add("d-none");
}

function asTeacher() {
  var l = document.getElementById("l");
  var r = document.getElementById("r");
  var sbtn = document.getElementById("sbtn");
  var tbtn = document.getElementById("tbtn");
  var sregLink = document.getElementById("sr");
  var tregLink = document.getElementById("tr");

  l.className = "text-secondary";
  r.className = "text-black";

  sbtn.classList.add("d-none");
  sregLink.classList.add("d-none");
  tbtn.classList.remove("d-none");
  tregLink.classList.remove("d-none");
}

function studentReg() {
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var contact = document.getElementById("con");
  var email = document.getElementById("mail");
  var pass = document.getElementById("pw");

  var form = new FormData();
  form.append("f", fname.value);
  form.append("l", lname.value);
  form.append("c", contact.value);
  form.append("e", email.value);
  form.append("p", pass.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "userLogin.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "studentRegProcess.php", true);
  r.send(form);
}

function teacherReg() {
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var contact = document.getElementById("con");
  var email = document.getElementById("mail");
  var pass = document.getElementById("pw");
  var cid = document.getElementById("cid");

  var form = new FormData();
  form.append("f", fname.value);
  form.append("l", lname.value);
  form.append("c", contact.value);
  form.append("e", email.value);
  form.append("p", pass.value);
  form.append("cid", cid.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "userLogin.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "teacherRegProcess.php", true);
  r.send(form);
}
//

function stuLogin() {
  var mail = document.getElementById("mail");
  var pass = document.getElementById("pw");
  var rem = document.getElementById("rem");

  var form = new FormData();
  form.append("m", mail.value);
  form.append("p", pass.value);
  form.append("r", rem.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "studentDashboard.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "studentLoginProcess.php", true);
  r.send(form);
}

function enableFeilds() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mail = document.getElementById("smail");
  var contact = document.getElementById("scontact");

  fname.removeAttribute("disabled");
  lname.removeAttribute("disabled");
  mail.removeAttribute("disabled");
  contact.removeAttribute("disabled");
}

function updateDetails(sid) {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mail = document.getElementById("smail");
  var contact = document.getElementById("scontact");

  var form = new FormData();
  form.append("fn", fname.value);
  form.append("ln", lname.value);
  form.append("e", mail.value);
  form.append("c", contact.value);
  form.append("sid", sid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        fname.setAttribute("disabled", "disabled");
        lname.setAttribute("disabled", "disabled");
        mail.setAttribute("disabled", "disabled");
        contact.setAttribute("disabled", "disabled");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "updateStudentProcess.php", true);
  r.send(form);
}

function teaLogin() {
  var mail = document.getElementById("mail");
  var pass = document.getElementById("pw");
  var rem = document.getElementById("rem");

  var form = new FormData();
  form.append("m", mail.value);
  form.append("p", pass.value);
  form.append("r", rem.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "teacherDashboard.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "teacherLoginProcess.php", true);
  r.send(form);
}

function uploadNote(cid) {
  var name = document.getElementById("name").value;
  var description = document.getElementById("dec").value;
  var fileInput = document.getElementById("notefile");

  if (!fileInput.files || fileInput.files.length === 0) {
    alert("Please select a file");
    return;
  }

  var formData = new FormData();
  formData.append("n", name);
  formData.append("des", description);
  formData.append("file", fileInput.files[0]);
  formData.append("cid", cid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      location.reload();
    }
  };

  r.open("POST", "noteUploadProcess.php", true);
  r.send(formData);
}

function hostLecture(cid) {
  var url = document.getElementById("url");
  var date = document.getElementById("date");
  var time = document.getElementById("selectedTime");

  var formData = new FormData();
  formData.append("url", url.value);
  formData.append("date", date.value);
  formData.append("time", time.value);
  formData.append("cid", cid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      location.reload();
    }
  };

  r.open("POST", "hostLectureProcess.php", true);
  r.send(formData);
}

function courseEnroll(sid, cid) {
  var btn = document.getElementById("btn" + cid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        btn.classList.remove("btn-light");
        btn.classList.add("btn-success");
        btn.innerHTML = "Enrolled";
        location.reload();
      }
    }
  };
  r.open("GET", "courseEnrollProcess.php?s=" + sid + "&c=" + cid, true);
  r.send();
}


function logOut(user) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "index.php";
      }
    }
  };
  r.open("GET", "logOutProcess.php?u=" + user, true);
  r.send();
}