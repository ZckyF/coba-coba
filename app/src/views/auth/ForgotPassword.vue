<template>
  <v-app  :class="$vuetify.theme.dark ? 'background-color-black' : 'background-color-white'">
    <v-card class="elevation-20 ma-auto" width="450" max-width="95%" height="400" max-height="90%">
      <v-container class="px-10">
        <v-card-text>
          <h1 class="text-center mt-10">Forgot Password</h1>
          <v-text-field density="compact" label="Email" prepend-inner-icon="mdi-email-outline" variant="outlined" class="mt-16"></v-text-field>
          <router-link to="/" class="mt-1">Login Page</router-link>
          <v-btn to="" class="font-weight-bold mt-5" block large> Forgot Password</v-btn>
        </v-card-text>
      </v-container>
    </v-card>
  </v-app>
</template>

<script>
export default {};
</script>

<style scoped>
.v-btn {
  background-image: linear-gradient(to right, #3d76e7, #1fb5be) !important;
  color: white;
  border-radius: 10px;
}

.v-card {
  border-radius: 15px;
}
</style>
