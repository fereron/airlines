<template>
    <div class="header-nav">
        <nav class="navbar navbar-static-top">
            <ul class="nav navbar-nav">
                <li>
                    <router-link :to="{ name: 'home' }">Главная</router-link>
                </li>
                <li>
                    <router-link to="/news">Новости</router-link>
                </li>
                <li><a href="#">Рейсы</a></li>
            </ul>

            <img class="img-logo" :src="this.logo_url" alt="">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Форум</a></li>
                <li><a href="#">Флот</a></li>
                <li v-if="!auth.user.authenticated"><a @click.prevent="loginModal" href="javascript:void(0)">Войти</a>
                </li>
                <li v-if="auth.user.authenticated">
                    <router-link :to="{ name: 'profile' }" :auth="auth">Профиль</router-link>
                </li>
                <li v-if="auth.user.authenticated">
                    <a @click.prevent="logoutUser" href="javascript:void(0)">Выйти</a>
                </li>
            </ul>
        </nav>

        <login-modal v-show="this.show_modal" @closeModal="closeModal"></login-modal>

        <div class="overlay" v-show="this.show_modal"></div>
    </div>
</template>

<script>
    import LoginModal from './LoginModal';
    import News from './News';

    export default {
        name: "navigation-component",
        components: {
            LoginModal, News
        },
        props: ['auth'],
        data() {
            return {
                logo_url: '/images/logo_azal.png',
                show_modal: false
            }
        },
        methods: {
            loginModal() {
                this.show_modal = true;
            },
            closeModal() {
                this.show_modal = false;
            },
            logoutUser() {
                this.auth.logout();
            }
        },
        created() {
            // console.log(this.auth);
            // axios.get('/api/user').then(res => {
            //     console.log(res);
            // });
        }
    }
</script>