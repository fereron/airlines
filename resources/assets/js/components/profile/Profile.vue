<template>
    <div class="profile">
        <div class="left_column">
            <image-upload :img-url="user.avatar"></image-upload>
            <div class="line"></div>

            <div class="name">
                <h2 v-if="!inputs.name">{{ fullName }}</h2>
                <svg v-if="!inputs.name" @click="inputs.name = !inputs.name" x="0px" y="0px"
	                                viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                                        <path d="M14.69,2.661c-1.894-1.379-3.242-1.349-3.754-1.266c-0.144,0.023-0.265,0.106-0.35,0.223l-4.62,6.374l-2.263,3.123
                                            c-0.277,0.382-0.437,0.836-0.462,1.307l-0.296,5.624c-0.021,0.405,0.382,0.698,0.76,0.553l5.256-2.01
                                            c0.443-0.17,0.828-0.465,1.106-0.849l1.844-2.545l5.036-6.949c0.089-0.123,0.125-0.273,0.1-0.423
                                            C16.963,5.297,16.56,4.021,14.69,2.661z M8.977,15.465l-2.043,0.789c-0.08,0.031-0.169,0.006-0.221-0.062
                                            c-0.263-0.335-0.576-0.667-1.075-1.03c-0.499-0.362-0.911-0.558-1.31-0.706c-0.08-0.03-0.131-0.106-0.126-0.192l0.122-2.186
                                            l0.549-0.755c0,0,1.229-0.169,2.833,0.998c1.602,1.166,1.821,2.388,1.821,2.388L8.977,15.465z"/>
                                    </svg>

                <input v-else @blur="uploadName" type="text" placeholder="Name"
                       v-model="fullName" autofocus>
            </div>

            <div class="position">
                <h3 v-if="!inputs.position">{{ user.position }}</h3>
                <h3 v-if="!user.position && !inputs.position">Your position</h3>
                <svg v-if="!inputs.position" @click="inputs.position = !inputs.position" x="0px" y="0px"
	                                viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                                        <path d="M14.69,2.661c-1.894-1.379-3.242-1.349-3.754-1.266c-0.144,0.023-0.265,0.106-0.35,0.223l-4.62,6.374l-2.263,3.123
                                            c-0.277,0.382-0.437,0.836-0.462,1.307l-0.296,5.624c-0.021,0.405,0.382,0.698,0.76,0.553l5.256-2.01
                                            c0.443-0.17,0.828-0.465,1.106-0.849l1.844-2.545l5.036-6.949c0.089-0.123,0.125-0.273,0.1-0.423
                                            C16.963,5.297,16.56,4.021,14.69,2.661z M8.977,15.465l-2.043,0.789c-0.08,0.031-0.169,0.006-0.221-0.062
                                            c-0.263-0.335-0.576-0.667-1.075-1.03c-0.499-0.362-0.911-0.558-1.31-0.706c-0.08-0.03-0.131-0.106-0.126-0.192l0.122-2.186
                                            l0.549-0.755c0,0,1.229-0.169,2.833,0.998c1.602,1.166,1.821,2.388,1.821,2.388L8.977,15.465z"/>
                                    </svg>

                <input v-else @blur="uploadPosition" type="text" placeholder="Должность"
                       v-model="user.position" autofocus>
            </div>
        </div>

        <div class="right_column">
            <div class="contact__information">
                <h2>Контактная информация</h2>

                <div class="info">

                    <div class="info__item">
                        <h4>Email:</h4>

                        <svg v-if="!inputs.email" @click="inputs.email = !inputs.email" version="1.1" id="Pencil" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                                viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                                        <path d="M14.69,2.661c-1.894-1.379-3.242-1.349-3.754-1.266c-0.144,0.023-0.265,0.106-0.35,0.223l-4.62,6.374l-2.263,3.123
                                            c-0.277,0.382-0.437,0.836-0.462,1.307l-0.296,5.624c-0.021,0.405,0.382,0.698,0.76,0.553l5.256-2.01
                                            c0.443-0.17,0.828-0.465,1.106-0.849l1.844-2.545l5.036-6.949c0.089-0.123,0.125-0.273,0.1-0.423
                                            C16.963,5.297,16.56,4.021,14.69,2.661z M8.977,15.465l-2.043,0.789c-0.08,0.031-0.169,0.006-0.221-0.062
                                            c-0.263-0.335-0.576-0.667-1.075-1.03c-0.499-0.362-0.911-0.558-1.31-0.706c-0.08-0.03-0.131-0.106-0.126-0.192l0.122-2.186
                                            l0.549-0.755c0,0,1.229-0.169,2.833,0.998c1.602,1.166,1.821,2.388,1.821,2.388L8.977,15.465z"/>
                                    </svg>

                        <p v-if="!inputs.email">{{ user.email }}</p>
                        <input v-if="inputs.email" @blur="uploadEmail" type="text" placeholder="Email"
                               v-model="user.email" autofocus>
                    </div>

                    <div class="info__item phone">
                        <h4>Телефон:</h4>

                        <svg v-if="!inputs.phone" @click="inputs.phone = !inputs.phone" version="1.1" id="Pencil" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                                viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                                        <path d="M14.69,2.661c-1.894-1.379-3.242-1.349-3.754-1.266c-0.144,0.023-0.265,0.106-0.35,0.223l-4.62,6.374l-2.263,3.123
                                            c-0.277,0.382-0.437,0.836-0.462,1.307l-0.296,5.624c-0.021,0.405,0.382,0.698,0.76,0.553l5.256-2.01
                                            c0.443-0.17,0.828-0.465,1.106-0.849l1.844-2.545l5.036-6.949c0.089-0.123,0.125-0.273,0.1-0.423
                                            C16.963,5.297,16.56,4.021,14.69,2.661z M8.977,15.465l-2.043,0.789c-0.08,0.031-0.169,0.006-0.221-0.062
                                            c-0.263-0.335-0.576-0.667-1.075-1.03c-0.499-0.362-0.911-0.558-1.31-0.706c-0.08-0.03-0.131-0.106-0.126-0.192l0.122-2.186
                                            l0.549-0.755c0,0,1.229-0.169,2.833,0.998c1.602,1.166,1.821,2.388,1.821,2.388L8.977,15.465z"/>
                                    </svg>

                        <p v-if="!inputs.phone">{{ user.profile.phone_number }}</p>
                        <input v-if="inputs.phone" @blur="uploadPhone" type="text" placeholder="Phone"
                               v-model="user.profile.phone_number" autofocus>
                    </div>

                    <div class="info__item">
                        <h4>Адресс:</h4>

                        <svg v-if="!inputs.address" @click="inputs.address = !inputs.address" version="1.1" id="Pencil" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                                viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                                        <path d="M14.69,2.661c-1.894-1.379-3.242-1.349-3.754-1.266c-0.144,0.023-0.265,0.106-0.35,0.223l-4.62,6.374l-2.263,3.123
                                            c-0.277,0.382-0.437,0.836-0.462,1.307l-0.296,5.624c-0.021,0.405,0.382,0.698,0.76,0.553l5.256-2.01
                                            c0.443-0.17,0.828-0.465,1.106-0.849l1.844-2.545l5.036-6.949c0.089-0.123,0.125-0.273,0.1-0.423
                                            C16.963,5.297,16.56,4.021,14.69,2.661z M8.977,15.465l-2.043,0.789c-0.08,0.031-0.169,0.006-0.221-0.062
                                            c-0.263-0.335-0.576-0.667-1.075-1.03c-0.499-0.362-0.911-0.558-1.31-0.706c-0.08-0.03-0.131-0.106-0.126-0.192l0.122-2.186
                                            l0.549-0.755c0,0,1.229-0.169,2.833,0.998c1.602,1.166,1.821,2.388,1.821,2.388L8.977,15.465z"/>
                                    </svg>

                        <p v-if="!inputs.address">{{ user.profile.address }}</p>
                        <input v-if="inputs.address" @blur="uploadAddress" type="text" placeholder="Address"
                               v-model="user.profile.address" autofocus>
                    </div>

                </div>
            </div>

            <div class="about">
                <h2>Обо мне</h2>

                <svg v-if="!inputs.about" @click="showTextarea" version="1.1" id="Pencil" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                                viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                                        <path d="M14.69,2.661c-1.894-1.379-3.242-1.349-3.754-1.266c-0.144,0.023-0.265,0.106-0.35,0.223l-4.62,6.374l-2.263,3.123
                                            c-0.277,0.382-0.437,0.836-0.462,1.307l-0.296,5.624c-0.021,0.405,0.382,0.698,0.76,0.553l5.256-2.01
                                            c0.443-0.17,0.828-0.465,1.106-0.849l1.844-2.545l5.036-6.949c0.089-0.123,0.125-0.273,0.1-0.423
                                            C16.963,5.297,16.56,4.021,14.69,2.661z M8.977,15.465l-2.043,0.789c-0.08,0.031-0.169,0.006-0.221-0.062
                                            c-0.263-0.335-0.576-0.667-1.075-1.03c-0.499-0.362-0.911-0.558-1.31-0.706c-0.08-0.03-0.131-0.106-0.126-0.192l0.122-2.186
                                            l0.549-0.755c0,0,1.229-0.169,2.833,0.998c1.602,1.166,1.821,2.388,1.821,2.388L8.977,15.465z"/>
                                    </svg>

                <p v-if="!inputs.about">{{ user.profile.about }}</p>
                <textarea ref="textarea" @input="textareaResize" @blur="uploadAbout"
                          v-model="user.profile.about" v-else autofocus></textarea>
            </div>
        </div>
    </div>
    <!--TODO Add Widgets-->
</template>

<script>
    import auth from '../../auth'
    import ImageUpload from './ImageUpload'

    export default {
        name: "profile",
        data() {
            return {
                auth: auth,
                token: localStorage.getItem('id_token'),
                user: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    avatar: 'no-user.gif',
                    position: 'Your position',
                    profile: {
                        phone_number: '',
                        address: '',
                        about: '',
                    },
                },
                inputs: {
                    name: false,
                    position: false,
                    email: false,
                    phone: false,
                    address: false,
                    about: false,
                }
            }
        },
        components: {
            ImageUpload
        },
        computed: {
            fullName: {
                get: function () {
                    return this.user.first_name + ' ' + this.user.last_name
                },
                set: function (newValue) {
                    var names = newValue.split(' ')
                    this.user.first_name = names[0]
                    this.user.last_name = names.filter(function (number, i) {
                        return i > 0;
                    }).join(' ');
                }
            },
        },
        mounted() {
            this.showProfile();
            // this.$nextTick(function () {
            //     auth.check();
            // });
        },
        beforeRouteEnter(to, from, next) {
            // вызывается до подтверждения пути, соответствующего этому компоненту.
            // НЕ имеет доступа к контексту экземпляра компонента `this`,
            // так как к моменту вызова экземпляр ещё не создан!

            let token = localStorage.getItem('id_token');

            if (token) {
                next()
            }
            next(false)
        },
        methods: {

            showProfile() {
                if (this.token !== null) {
                    axios.get('https://localhost:3000/api/user?token=' + this.token)
                        .then(response => {
                            this.user = response.data;
                            this.$bar.finish()
                        })
                }
            },

            uploadName() {
                this.inputs.name = !this.inputs.name;

                axios.post('https://localhost:3000/api/user/update?token=' + this.token, {
                    first_name: this.user.first_name,
                    last_name: this.user.last_name
                }).then((res) => {
                });
            },
            uploadPosition() {
                this.inputs.position = !this.inputs.position;

                axios.post('https://localhost:3000/api/user/update?token=' + this.token, {position: this.user.profile.position}).then((res) => {
                });
            },
            uploadEmail() {
                this.inputs.email = !this.inputs.email;

                axios.post('https://localhost:3000/api/user/update?token=' + this.token, {email: this.user.email}).then((res) => {
                });
            },
            uploadPhone() {
                this.inputs.phone = !this.inputs.phone;

                axios.post('https://localhost:3000/api/user/update?token=' + this.token, {phone_number: this.user.profile.phone_number}).then((res) => {
                });
            },
            uploadAddress() {
                this.inputs.address = !this.inputs.address;

                axios.post('https://localhost:3000/api/user/update?token=' + this.token, {address: this.user.profile.address}).then((res) => {
                });
            },
            showTextarea() {
                this.inputs.about = !this.inputs.about;

                this.$nextTick(() => {
                        this.$refs.textarea.style.minHeight = this.$refs.textarea.scrollHeight + 'px';
                    }
                )
            },
            textareaResize() {
                this.$refs.textarea.style.minHeight = this.$refs.textarea.scrollHeight + 'px';
            },
            uploadAbout() {
                this.inputs.about = !this.inputs.about;

                axios.post('https://localhost:3000/api/user/update?token=' + this.token, {about: this.user.profile.about}).then((res) => {
                });
            },

        }
    }
</script>
