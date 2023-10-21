<template>
  <v-app :class="$vuetify.theme.dark ? 'background-color-black' : 'background-color-white'">
    <SideBar page="admin" />
    <v-main>
      <router-view />
      <Footer />
    </v-main>
  </v-app>
</template>

<script>
import Footer from '@/components/layouts-element/Footer.vue';
import SideBar from '@/components/layouts-element/SideBar.vue';

export default {
  components: {
    Footer,
    SideBar,
  },
};
</script>

<style>
</style>
