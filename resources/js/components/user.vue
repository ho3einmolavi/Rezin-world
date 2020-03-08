<template>
    <div>
        <div v-if="ok === 1">
            <another-header @setting="get_setting($event)"></another-header>
            <section>
                <center>
                    <div class="col col-sm col-xs col-md col-lg col-xl-12 dashboard-page flex">
                        <user-dashboard></user-dashboard>
                        <user-dashboard-res></user-dashboard-res>

                        <router-view></router-view>
                    </div>
                </center>
            </section>
            <main-footer :setting="setting"></main-footer>
        </div>
        <forbidden v-if="ok === 0"></forbidden>
    </div>
</template>

<script>
    export default {
        name: "user" ,
        data() {
            return {
                setting: [] ,
                loggedInUser: null ,
                ok: ''
            }
        } ,

        created() {
            this.checkForUser();
        } ,

        methods: {
            checkForUser() {
                axios({
                    method: 'get' ,
                    url: '/api/user' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        this.ok = 1;
                        console.log(res);

                    })
                    .catch(err => {
                        this.ok = 0;
                        console.log(err.response);
                    })
            } ,
            get_setting(event) {
                this.setting = event
            },
        }
    }
</script>

<style scoped>

</style>