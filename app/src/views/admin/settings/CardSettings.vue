<template>
  <v-card class="ma-10">
    <v-row>
      <v-col cols="12" sm="6" md="4" class="ma-3">
        <p class="text-h5 font-weight-bold ml-3" :style="$vuetify.theme.dark ? 'color:#EAEAEA' : 'color: #575757'">Languages</p>
        <v-select class="ml-5 mt-5" :items="languages" label="Languages" dense solo></v-select>
      </v-col>
      <v-col cols="12" sm="6" md="4" class="ma-3">
        <p class="text-h5 font-weight-bold ml-3" :style="$vuetify.theme.dark ? 'color:#EAEAEA' : 'color: #575757'">Themes</p>
        <v-radio-group class="ml-5 mt-5" v-model="theme" row>
          <v-radio label="Light" value="light" @click="setDarkMode(false)" color="#3d76e7"></v-radio>
          <v-radio label="Dark" value="dark" @click="setDarkMode(true)" color="#3d76e7"></v-radio>
        </v-radio-group>
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
export default {
  data: () => ({
    languages: ['Bahasa Indonesia', 'English'],
    darkMode: false,
    theme: 'light',
  }),

  methods: {
    setDarkMode(isDark) {
      this.darkMode = isDark;
      this.theme = isDark ? 'dark' : 'light';
      this.$vuetify.theme.dark = isDark;
      // Simpan preferensi tema ke localStorage
      localStorage.setItem('appTheme', this.theme);
    },
  },
  created() {
    // Coba mengambil pengaturan tema dari localStorage saat komponen dibuat
    const storedTheme = localStorage.getItem('appTheme');
    if (storedTheme) {
      this.theme = storedTheme;
      this.darkMode = storedTheme === 'dark';
    }
  },
};
</script>

<style></style>
