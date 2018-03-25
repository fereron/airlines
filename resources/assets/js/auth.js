import {router} from "./routes";

export default {
    user: {
        authenticated: false,
        profile: null
    },
    check() {
        let token = localStorage.getItem('id_token');

        if (token !== null) {
            // console.log(token);
            axios.get('api/user?token=' + token)
                .then(response => {
                    this.user.authenticated = true;
                    this.user.profile = response.data;
                    // console.log(this.user);

                    // return 'yees';
                })
        }

        // return this.user.authenticated;
    },
    register(user) {
        axios.post('api/register', user)
            .then(response => {
                console.log(response);
                // this.register
                // this.showLogin();
            });
    },
    login(user) {
        axios.post('api/login', user)
            .then(response => {
                // console.log(response);

                localStorage.setItem('id_token', response.data.meta.token);

                this.user.authenticated = true;
                this.user.profile = response.data.data;

                return true;
            });
    },
    logout() {
        localStorage.removeItem('id_token');

        this.user.authenticated = false;
        this.user.profile = null;

        router.push({
            name: 'home'
        });
    },

}