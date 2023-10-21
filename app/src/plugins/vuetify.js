import '@fortawesome/fontawesome-free/css/all.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

Vue.use(Vuetify);
const storedTheme = localStorage.getItem('appTheme');

export default new Vuetify({
  theme: {
    dark: storedTheme === 'dark',
    themes: {
      light: {
        colors: {
          //   primary: '#1867C0',
          //   secondary: '#5CBBF6',
        },
      },
    },
  },
  icons: {
    iconfont: 'md' || 'fa' || 'mdi',
  },
});
