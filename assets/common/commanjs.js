// ------------------------------ User search--------------------------------

function user_search(page) {
    var action = $("#action").val();
    var name = $("#sname").val();
    var email = $("#semail").val();
    var phone = $("#sphone").val();
    var limit = $("#list").val();
    var sort_field = $("#sort_field").val() == "" ? "sno" : $("#sort_field").val();
    var sort_type = $("#sort_type").val() == "" ? "asc" : $("#sort_type").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/ciproject/Usermaster/pagination",
        data: {
            action: action,
            name: name,
            email: email,
            phone: phone,
            limit: limit,
            page: page,
            sort_field: sort_field,
            sort_type: sort_type
        },
        dataType: 'Json',
        success: function (data) {
            $("#data").html(data.table_data);
            $("#pagin").html(data.pagination);
        },
    });
}

// ------------------------------Sorting Function Comman For All Master--------------------------------

function sort(sort_type, field) {
    var action = $("#action").val();
    var sort = sort_type;
    var field_name = field;
    if (sort == "asc") {
        $('.d-asc').show();
        $('.desc').show();
        $('.asc').hide();
    } else {
        $('.asc').show();
        $('.desc').hide();
    }
    $("#sort_field").val(field_name);
    $("#sort_type").val(sort);

    if (action == "user") {
        user_search();
    }else if (action == "client") {
        client_search();
    }else if (action == "item") {
        item_search();
    }else if (action == "invoice") {
        invoice_search();
    }else if (action == "logs") {
        log_search();
    }else if (action == "login_status") {
        loginstatus_search();
    }

}

function userhide() {
    $("#nav-profile").removeClass("active show");
    $("#nav-home").addClass("show active");
    $("#nav-profile-tab").removeClass("active");
    $("#nav-home-tab").addClass("active");
    $("#nav-profile-tab").html("Add User");
    $('#form_action').val("insert");
    $('#submit').val("Save");
    $('input[type=text], input[type=email], input[type=password]').val("");
    // $("#passworddiv").removeClass("d-none");
    document.getElementById("nav-home-tab").setAttribute('aria-selected', 'true');
    document.getElementById("nav-profile-tab").setAttribute('aria-selected', 'false');
}

// ------------------------------ Client search--------------------------------

function client_search(page) {
    var name = $("#sname").val();
    var email = $("#semail").val();
    var phone = $("#sphone").val();
    var action = $("#action").val();
    var limit = $("#list").val();
    var sort_field = $("#sort_field").val() == "" ? "sno" : $("#sort_field").val();
    var sort_type = $("#sort_type").val() == "" ? "asc" : $("#sort_type").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/ciproject/Clientmaster/pagination",
        data: {
            name: name,
            email: email,
            phone: phone,
            action: action,
            limit: limit,
            page: page,
            sort_field: sort_field,
            sort_type: sort_type
        },
        dataType: 'Json',
        success: function (data) {
            $("#data").html(data.table_data);
            $("#pagin").html(data.pagination);
        },
    });
}

// ------------------------------ Item search--------------------------------

function item_search(page) {
    var name = $("#sname").val();
    var action = $("#action").val();
    var limit = $("#list").val();
    var sort_field = $("#sort_field").val() == "" ? "sno" : $("#sort_field").val();
    var sort_type = $("#sort_type").val() == "" ? "asc" : $("#sort_type").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/ciproject/Itemmaster/pagination",
        data: {
            name: name,
            action: action,
            limit: limit,
            page: page,
            sort_field: sort_field,
            sort_type: sort_type
        },
        dataType: 'Json',
        success: function (data) {
            $("#data").html(data.table_data);
            $("#pagin").html(data.pagination);
        },
    });
}

// ------------------------------ invoice search--------------------------------

function invoice_search(page) {
    var invoice_id = $("#sinvoicenumber").val();
    var name = $("#sname").val();
    var email = $("#semail").val();
    var phone = $("#sphone").val();
    var action = $("#action").val();
    var limit = $("#list").val();
    var sort_field = $("#sort_field").val() == "" ? "invoice_id" : $("#sort_field").val();
    var sort_type = $("#sort_type").val() == "" ? "asc" : $("#sort_type").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/ciproject/Invoicemaster/pagination",
        data: {
            invoice_id: invoice_id,
            name: name,
            email: email,
            phone: phone,
            action: action,
            limit: limit,
            page: page,
            sort_field: sort_field,
            sort_type: sort_type
        },
        dataType: 'Json',
        success: function (data) {
            $("#data").html(data.table_data);
            $("#pagin").html(data.pagination);
        },
    });
}

// ------------------------------ UserLog search--------------------------------

function log_search(page) {
    var action = $("#action").val();
    var id = $("#sid").val();
    var type = $("#stype").val();
    var name = $("#sname").val();
    var limit = $("#list").val();
    var sort_field = $("#sort_field").val() == "" ? "datetime" : $("#sort_field").val();
    var sort_type = $("#sort_type").val() == "" ? "desc" : $("#sort_type").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/ciproject/Userlogs/pagination",
        data: {
            action: action,
            id: id,
            type: type,
            name: name,
            limit: limit,
            page: page,
            sort_field: sort_field,
            sort_type: sort_type
        },
        dataType: 'Json',
        success: function (data) {
            $("#data").html(data.table_data);
            $("#pagin").html(data.pagination);
        },
    });
}

// ------------------------------ LogIn Status search--------------------------------

function loginstatus_search(page) {
    var action = $("#action").val();
    var loginstatus = $("#sloginstatus").val();
    var name = $("#sname").val();
    var limit = $("#list").val();
    var sort_field = $("#sort_field").val() == "" ? "is_login" : $("#sort_field").val();
    var sort_type = $("#sort_type").val() == "" ? "desc" : $("#sort_type").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/ciproject/Loginstatus/pagination",
        data: {
            action: action,
            loginstatus: loginstatus,
            name: name,
            limit: limit,
            page: page,
            sort_field: sort_field,
            sort_type: sort_type
        },
        dataType: 'Json',
        success: function (data) {
            $("#data").html(data.table_data);
            $("#pagin").html(data.pagination);
        },
    });
}

// ------------------------------ Tab Hide Function--------------------------------

function TabShow() {
    $("#nav-home").removeClass("show active");
    $("#nav-profile").addClass("active show");
    $("#nav-home-tab").removeClass("active");
    $("#nav-profile-tab").addClass("active");
    $("#nav-home-tab").attr('aria-selected', 'false');
    $("#nav-profile-tab").attr('aria-selected', 'true');
}

// ------------------------------ Eye Function--------------------------------

function change() {
    if (document.getElementById("loginpassword").type == 'password') {
        $("#logineye").removeClass("fa-solid fa-eye-slash");
        $("#logineye").addClass("fa-solid fa-eye");
        document.getElementById("loginpassword").type = "text";
    } else {
        $("#logineye").removeClass("fa-solid fa-eye");
        $("#logineye").addClass("fa-solid fa-eye-slash");
        document.getElementById("loginpassword").type = "password";
    }
}





//------------------------------ Image Preview-----------------------------------------

function ImageShowInImageTag(e, imgpre) {
    const file = e.files[0];
    if (file) {
        if (imgpre.style.display == "none")
            imgpre.style.display = "block";

        let reader = new FileReader();
        reader.onload = function (event) {
            $(imgpre).attr('src', event.target.result);
        };
        reader.readAsDataURL(file);
    }
}

// ---------------------------------------------Invoice Tab code-----------------------------------

function invoiceTabShow() {
    $("#nav-home").removeClass("show active");
    $("#nav-profile").addClass("active show");
    $("#nav-home-tab").removeClass("active");
    $("#nav-profile-tab").addClass("active");
    $("#client").addClass("d-none");

    $("#nav-profile-tab").html("Edit Invoice");

    $("#nav-home-tab").attr('aria-selected', 'false');
    $("#nav-profile-tab").attr('aria-selected', 'true');

}

function invoicehide() {
    window.location.reload();
}

// function addHide() {

//     var trLength = $("#itemTable").find("tbody tr").length;
//     if (trLength > 1) {
//         $("#itemTable").find("tbody tr:first td:nth-child(6)").removeClass("d-none");
//     }
// }

// ---------------------------------------------Logout Function-----------------------------------

function logout() {
    $.confirm({
        title: '',
        content: 'Are You Sure Want To Logout ?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            confirm: function () {
                window.location.href = "http://localhost/ciproject/Logout";
            },
            cancel: function () {
                //close
            },
        }
    });
}

// ---------------------------------------------Sidebar Searching-----------------------------------

const searchside = () => {
    let filter = document.getElementById('myinput').value.toUpperCase();
    let ul = document.getElementById('sideul');
    let li = ul.getElementsByTagName('li');
    let search = document.getElementById('side_search');

    for (let index = 0; index < li.length; index++) {
        let a = li[index].getElementsByTagName('a')[0];
        let textValue = a.textContent || a.innerHTML;

        if (textValue.toUpperCase().indexOf(filter) > -1) {
            li[index].style.display = '';
            search.style.display = '';

        } else {
            li[index].style.display = 'none';
            search.style.display = '';
        }
    }
}

// ---------------------------------------------Reset Table Function-----------------------------------

function clear_val(data) {
    if (data == 'user') {
        $("#sname").val("");
        $("#semail").val("");
        $("#sphone").val("");
        user_search();
    } else if (data == 'client') {
        $("#sname").val("");
        $("#semail").val("");
        $("#sphone").val("");
        client_search();
    } else if (data == 'item') {
        $("#sname").val("");
        item_search();
    } else if (data == 'invoice') {
        $("#sinvoicenumber").val("");
        $("#sname").val("");
        $("#semail").val("");
        $("#sphone").val("");
        invoice_search();
    } else if (data == 'logs') {
        $("#sid").val("");
        $("#stype").val("");
        $("#sname").val("");
        log_search();
    } else if (data == 'logs') {
        $("#sid").val("");
        $('#sloginstatus').prop('selectedIndex', 0);
        loginstatus_search();
    }
}

function darkMode() {
    // alert();
    $("#dark").toggleClass("fa-toggle-on fa-toggle-off");
    $("#sidebar").toggleClass("navbar-dark bg-dark");
    $("#sidebar").find("ul li a").toggleClass("green");
    $("#myinput").toggleClass("green");
    $("#upper_navbar").toggleClass("navbar-dark bg-dark");
    $("#content").toggleClass("green");
    $(".rounded").toggleClass("bg-light bg-dark");
    $(document).find(".mybox").toggleClass("green");
    $(document).find(".form-control").toggleClass("green");
    $("table").toggleClass("table-dark");
    $(document).find(".nav-link").toggleClass("green");

}

function apply() {
    if (localStorage.getItem("theme") === "dark") {
        alert("hey");
        darkMode();
    }
}

function findDark() {
    var len = $(document).find('.green').length;
    if (len > 1) {
        localStorage.setItem("theme", "dark");
    }
    else {
        localStorage.setItem("theme", "light");
    }
}

$('.sub-menu ul').hide();
$(".sub-menu a").on("click", function () {
    $(this).parent(".sub-menu").children("ul").slideToggle("100");
    $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

document.addEventListener("keydown", e => {
    // e.preventDefault();
    if (e.key.toLowerCase() === "s" && e.altKey) {
        document.getElementById("myinput").focus();
    }
    if (e.key.toLowerCase() === "u" && e.ctrlKey && e.shiftKey) {
        document.getElementById("user").click();
    }
    if (e.key.toLowerCase() === "c" && e.ctrlKey && e.shiftKey) {
        document.getElementById("client").click();
    }
    if (e.key.toLowerCase() === "o" && e.shiftKey && e.altKey) {
        document.getElementById("item").click();
    }
    if (e.key.toLowerCase() === "i" && e.ctrlKey && e.shiftKey) {
        document.getElementById("invoice").click();
    }
    if (e.key.toLowerCase() === "l" && e.ctrlKey && e.shiftKey) {
        document.getElementById("invoice").click();
    }
});


function changecolor(e) {
    var colorbg = e.style.columnRuleColor;
    // var colortext = e.style.textDecorationColor;
    // var colortextchild = e.style.color;
    var colorbgchild = e.style.borderColor;
    localStorage.setItem("colorbg", colorbg);
    localStorage.setItem("colorbgchild", colorbgchild);
    // localStorage.setItem("colortext", colortext);
    // localStorage.setItem("colortextchild", colortextchild);
}

var r = document.querySelector(':root');
function myFunction_set() {
    var colorbg = localStorage.getItem("colorbg");
    // var colortext = localStorage.getItem("colortext");
    // var colortextchild = localStorage.getItem("colortextchild", colortextchild);
    var colorbgchild = localStorage.getItem("colorbgchild");
    r.style.setProperty('--main', colorbg);
    r.style.setProperty('--main-child', colorbgchild);
    // r.style.setProperty('--mainText', colortext);
    // r.style.setProperty('--mainTextChild', colortextchild);
}

window.onload = myFunction_set();

function randomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    localStorage.setItem("colorbg", color);
    localStorage.setItem("colorbgchild", color);
    myFunction_set();
}

// var interval = setInterval(function () { updateActivity(); }, 5000);
