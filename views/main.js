let pop = document.getElementById("popup");
let input_change_text = document.getElementById("id_input_change");;
let text_pole = document.getElementById("class_to_cater");
let change_pop = document.getElementById("change_pop_up");
let otpr = document.getElementById("but");
let but;
function getCookie(name){
    let cookie = document.cookie.split('; ').find(row => row.startsWith(name + '='));
    return cookie ? cookie.split('=')[1] : null;
}
function pop_up(){
    pop.style.visibility="visible";
}

function close_window(){
    pop.style.visibility="hidden";
}

//let popap = document.getElementById("change_category");

let pan = document.getElementById("panel");
function admin_panel(){
    pan.style.visibility="visible";
}


function zakr(){
    pan.style.visibility="hidden";
}


function coment(){
    let comentar = document.getElementById('pop');
    comentar.style.visibility="visible"
}
function coment_close(){
    let comentar = document.getElementById('pop');
    comentar.style.visibility="hidden"
}

const login_repeat = () => {
    alert("Извените, пользователь с таким логином уже зарегестрирован")
}
let prava = false;
function prava_proverkf(){
    prava = true;
}
function proverka(){
    //let name = document.getElementById('name');
    //let surname = document.getElementById('surname');
    ///let login = document.getElementById('login');
    //let email = document.getElementById('email');
    let password = document.getElementById('password').value;
    let password_repeat = document.getElementById('password_repeat').value;
    let what = true;

    if(password != password_repeat){
        alert("Пароли не совпадают");
    }else if(password.length < 8){
        alert("Пароль должен быть не короче 8ми символов");
    }

    if(document.getElementById('name').value == "") {
        document.getElementById('name').style.backgroundColor="rgba(255, 0, 0, 0.5)";
        what = false
    }
    else document.getElementById('name').style.backgroundColor="rgba(0, 255, 26, 0.5)";
    if(document.getElementById('surname').value == ""){
        document.getElementById('surname').style.backgroundColor="rgba(255, 0, 0, 0.5)";
        what = false
    }
    else document.getElementById('surname').style.backgroundColor="rgba(0, 255, 26, 0.5)";
    if(document.getElementById('login').value == ""){
        document.getElementById('login').style.backgroundColor="rgba(255, 0, 0, 0.5)";
        what = false
    }
    else document.getElementById('login').style.backgroundColor="rgba(0, 255, 26, 0.5)";
    if(document.getElementById('email').value == ""){
        document.getElementById('email').style.backgroundColor="rgba(255, 0, 0, 0.5)";
        what = false
    }
    else document.getElementById('email').style.backgroundColor="rgba(0, 255, 26, 0.5)";
    if(document.getElementById('password').value == ""){
        document.getElementById('password').style.backgroundColor="rgba(255, 0, 0, 0.5)";
        what = false
    }
    else document.getElementById('password').style.backgroundColor="rgba(0, 255, 26, 0.5)";
    if(document.getElementById('password_repeat').value == ""){
        document.getElementById('password_repeat').style.backgroundColor="rgba(255, 0, 0, 0.5)";
        what = false
    }
    else document.getElementById('password_repeat').style.backgroundColor="rgba(0, 255, 26, 0.5)";
    if(what == false)alert("Заполните все поля")
    else if(password.value != password_repeat.value){
        alert("Пароли не совпадают")
    }

    if(prava === false){
        alert("Примите пользовательское соглашение")
    }
    
}



/*<div class="position">
    <a href="/autorization" class="button">
        <div class="position_col">
            <h3>Войти</h3>
        </div>
    </a>
</div>
*/
