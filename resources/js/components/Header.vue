<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><p>{{ $t('header.title') }}</p></div>

                    <div class="card-body">
                        <div class="lang form-group">
                            <select name="language" class="form-select form-control" @change="callSetLangActions($event)">
                                <option v-for="lang in optionLangs" :value="lang.value">{{ lang.text }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </div>
</template>

<script>
    export default {
        mounted() {

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
                ]
            };
        },
        methods: {
            callSetLangActions(event) {
                var lang = event.target.options[event.target.options.selectedIndex].value;
                this.$store.dispatch('setLang', lang)
            }
        }
    }
</script>
