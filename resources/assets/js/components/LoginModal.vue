<template>
    <transition name="modal">
        <div class="login-modal">
            <div class="modal-content">
                <button id="close-modal" class="icon-close" @click="closeModal">x</button>
                <header>
                    <a id="login" href="#" class="active" @click.prevent="showLogin">Войти</a>
                    <a id="register" href="#" @click.prevent="showRegister">Регистрация</a>
                </header>
                <div class="modal-body">
                    <section id="login-body">
                        <form>
                            <input type="text" placeholder="Логин" v-model="login.email">
                            <vue-password
                                    v-model="login.password"
                                    classes="input"
                                    :disableStrength="true"
                                    minlength="6"
                                    placeholder="Пароль"
                            >
                            </vue-password>

                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">Запомнить меня</label>

                            <footer>
                                <a class="close-modal" @click.prevent="closeModal">Отмена</a>
                                <button type="submit" @click.prevent="loginUser">Войти</button>
                            </footer>
                        </form>
                    </section>
                    <section id="register-body" style="display: none">
                        <input type="text" placeholder="Имя" v-model="register.first_name">
                        <input type="text" placeholder="Фамилия" v-model="register.last_name">
                        <input type="email" placeholder="Email" v-model="register.email">
                        <input type="password" placeholder="Пароль" v-model="register.password">
                        <!--<input type="password" placeholder="Подтвердите пароль">-->
                        <footer>
                            <a class="close-modal" @click="closeModal">Отмена</a>
                            <button @click="registerUser">Зарегистрироваться</button>
                        </footer>
                    </section>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import VuePassword from 'vue-password'
    import auth from '../auth'

    export default {
        name: "login-modal",
        components: {
            VuePassword
        },
        data() {
            return {
                login: {
                    email: '',
                    password: ''
                },
                register: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            closeModal() {
                this.$emit('closeModal');
            },
            showRegister() {
                document.getElementById('login').classList.remove('active');
                document.getElementById('register').classList.add('active');
                document.getElementById('login-body').style.display = "none";
                document.getElementById('register-body').style.display = "block";
                document.getElementById('register-body').style.display = "block";
                document.getElementById('close-modal').style.background = "#fff";
            },
            showLogin() {
                document.getElementById('register').classList.remove('active');
                document.getElementById('login').classList.add('active');
                document.getElementById('register-body').style.display = "none";
                document.getElementById('login-body').style.display = "block";
                document.getElementById('close-modal').style.background = "#F3E9DD";
            },
            loginUser() {
                axios.post('api/login', this.login)
                    .then(response => {
                        // console.log(response);

                        localStorage.setItem('id_token', response.data.meta.token);

                        auth.user.authenticated = true;
                        auth.user.profile = response.data.data;

                        this.closeModal();
                        this.$router.push('/dashboard/profile');
                    });
            },
            registerUser() {
                // auth.register(this.register);
                // axios.post('api/register', this.register)
                //     .then(response => {
                //         console.log(response);
                        // this.register
                    // });

                axios.post('api/register', this.register)
                    .then(response => {
                        console.log(response);
                        // this.register
                        // this.showLogin();
                        this.showLogin();
                    });
                // console.log(this.register);
            }
        }
    }
</script>