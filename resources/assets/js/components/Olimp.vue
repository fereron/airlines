<template>
    <form action="" v-on:submit.prevent="olimpSend">
        <input type="number" placeholder="Input value" v-model="number">
        <input type="submit" value="Submit">
    </form>
</template>

<script>
    export default {
        name: "app",
        data() {
            return {
                number: 0
            }
        },
        mounted() {
            this.$bar.finish()
        },
        methods: {
            olimpSend() {
                console.log(this.number);

                axios.post('/olimp/zadaca', {
                    number: this.number
                }).then((res) => {
                    console.log(res)
                })
            }
        }
    }
</script>

<style scoped>
    form {
        margin-top: 50px;
    }
</style>