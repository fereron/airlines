<template>
    <div class="profile_image">
        <input id="fileInput" class="input__avatar" type="file" accept="image/*" @change="onImageChange">
        <img :src="image" alt="avatar">
    </div>
</template>

<script>


    export default {
        name: "image-upload",
        props: ['imgUrl'],
        data() {
            return {
                image: '/images/loader.gif',
            }
        },
        mounted() {
            setTimeout(() => {
                this.image = '/images/users/' + this.imgUrl;
            }, 1000);
        },
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;

                if (!files.length) {
                    return;
                }

                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;

                    this.uploadImage();
                };

                reader.readAsDataURL(file);
            },
            uploadImage() {
                let token = localStorage.getItem('id_token');

                axios.post('/api/user/upload-image?token=' + token, {image: this.image} ).then(res => {
                   console.log(res);
                });
            }
        }
    }
</script>