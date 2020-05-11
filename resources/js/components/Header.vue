<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link :to="{path: '/'}" class="navbar-brand">{{ $t('header.title') }}</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="auth-user mr-auto" v-if="checkAuth()">
                <span>{{ $t('header.navigations.greeting') }}, {{ $store.state.username }}</span>
                <router-link :to="{path: '/login'}" class="btn btn-link">{{ $t('header.navigations.logout') }}</router-link>
                <router-link :to="{path: '/dashboard'}" class="btn btn-light" v-if="!checkDashBoardVisibleLink()">{{ $t('header.navigations.return_dashboard') }}</router-link>
            </div>
            <ul class="navbar-nav mr-auto" v-else>
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li> -->
               <!--  <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                <li class="nav-item" v-for="navigation in navigations">
                    <router-link :to="{path: navigation.link}" class="nav-link">{{ $t(navigation.text) }}</router-link>
                </li>
            </ul>
            <div class="lang form-group my-2 my-lg-0">
                <select name="language" class="form-select form-control" @change="callSetLangActions($event)">
                    <option v-for="lang in optionLangs" :value="lang.value">{{ lang.text }}</option>
                </select>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log(this.$router.history.current.name);
        },
        data: function () {
            return {
                optionLangs: [
                    {
                        text: 'Vietnamese',
                        value: 'vn'
                    },
                    {
                        text: 'English',
                        value: 'en'
                    },
                    {
                        text: 'Japanese',
                        value: 'jp'
                    }
                ],
                navigations: [
                    {
                        text: 'header.navigations.login',
                        link: '/login'
                    },
                    {
                        text: 'header.navigations.register',
                        link: '/register'
                    }
                ], 
                auth: {
                    auth: false,
                    username: ''
                }
            };
        },
        methods: {
            callSetLangActions(event) {
                var lang = event.target.options[event.target.options.selectedIndex].value;
                this.$store.dispatch('setLang', lang)
            },
            checkAuth() {
                return this.$store.state.auth;
            },
            checkDashBoardVisibleLink() {
                return this.$store.state.dashboard_visible_link;
            }
        },
    }
</script>

<style type="text/css">
    .navbar {
        margin-bottom: 20px;
    }
    .navbar-expand-lg {
        background-color: rgba(0, 0, 0, 0.03) !important;
    }
    .form-select {
        cursor: pointer;
    }
    .auth-user {
        font-size: 20px;
        margin-right: 20px;
        padding-left: 10px;
        border-left: 1px solid #adb5bd;
    }
</style>