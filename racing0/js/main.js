async function getLoginAndPassword(login, password) {
    const answer = await fetch(
        `api/?method=login&login=${login}&password=${password}`
    );
    return await answer.json();
}

async function signUpUser(name, login, password) {
    await fetch(
        `api/?method=signup&name=${name}&login=${login}&password=${password}`
    );
}

window.onload = async function () {

    const output = document.getElementById('output');
    const nameInput = document.getElementById('name');
    const loginInput = document.getElementById('login');
    const passwordInput = document.getElementById('password');
    const loginBtn = document.getElementById('loginBtn');
    const signUpBtn = document.getElementById('signUpBtn');
    //const logOutBtn = document.getElementById('logOutBtn');

    loginBtn.addEventListener('click', async function () {

        let login = loginInput.value;
        let password = passwordInput.value;

        let answer = await getLoginAndPassword(login, password);

        if (answer['data']) {
            output.innerHTML = `Добро пожаловать, ${answer['data'].name}!`;
        } else output.innerHTML = 'Введены неверные авторизационные данные!';       //как на ИИАС
    });

    signUpBtn.addEventListener('click', async function () {

        let name = nameInput.value;
        let login = loginInput.value;
        let password = passwordInput.value;

        await signUpUser(name, login, password);

        //для проверки:
        let answer = await getLoginAndPassword(login, password);

        if (answer['data']) {
            output.innerHTML = `Добро пожаловать, ${answer['data'].name}!`;
        } else output.innerHTML = 'неа';

    });
}