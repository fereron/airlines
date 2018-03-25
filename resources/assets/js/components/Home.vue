<template>
    <section class="header" style="background: url('/images/background-top.png'); background-size: cover;">
        <div class="container">
            <navigation :auth="auth"></navigation>
            <img class="plane-header" src="/images/plane-top.png" alt="">
            <h2>AZERBAIJANI</h2>
            <div class="left-line"></div>
            <h1>AVIATION CLUB</h1>
            <div class="right-line"></div>
        </div>
    </section>
</template>

<script>
    import auth from '../auth'
    export default {
        name: "home",
        data() {
            return {
                auth: auth
            }
        },
        mounted: function () {
            // console.log(auth);
            this.$nextTick(function () {
                auth.check()
                // console.log(auth.user.authenticated);

                this.$bar.finish()
            })
        }
    }
</script>