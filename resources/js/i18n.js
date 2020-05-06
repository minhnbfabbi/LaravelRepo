import Vue from 'vue';
import VueInternationalization from 'vue-i18n';
import vnMessage from './langs/vn.json'
import enMessage from './langs/en.json'
import jpMessage from './langs/jp.json'

Vue.use(VueInternationalization);

const messages = {
  vn: vnMessage,
  en: enMessage,
  jp: jpMessage,
}

const i18n = new VueInternationalization({
    locale: 'vn',
    messages,
    fallbackLocale: 'vn'
});

export default i18n;