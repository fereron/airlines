<template>
    <div class="search">
        <input type="text" placeholder="Искать группы, людей" v-on:keyup="search" v-model="query" @blur="blurSearch">
        <div class="results" v-show="result">
            <ul>
                <li v-for="user in users.slice(0, 5)">
                    <router-link :to="{ name: 'user', params: { id: user.id } }">{{ user.first_name + ' ' + user.last_name }}</router-link>
                </li>
                <li v-if="users.length > 5">
                    <router-link :to="url">Показать всех пользователей</router-link>
                </li>
                <li v-show="!users.length">
                    <a href="javascript:void(0)">Нет найденных пользователей</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "search",
        data() {
            return {
                token: localStorage.getItem('id_token'),
                query: '',
                result: false,
                users: [],
                url: ''
            }
        },
        methods: {
            search() {
                if(this.query.length > 1) {
                    axios.get('http://localhost:3000/api/users?q=' + this.query + '&token=' + this.token)
                        .then(response => {
                            this.users = response.data.users;
                            this.result = true;
                            this.url = '/dashboard/search?query=' + this.query
                        })
                }
                else {
                    this.users = [];
                    this.result = false;
                }
            },
            blurSearch() {
                setTimeout(() => {
                    this.result = false
                }, 400)
            }
        },
    }
</script>