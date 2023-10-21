<template>
  <v-form ref="form" lazy-validation>
    <v-container>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field prepend-icon="mdi-store-outline" v-model="editedItem.name" label=" Name" :rules="[(v) => !!v || 'This field must be filled!']"></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field prepend-icon="mdi-email" v-model="editedItem.email" label="Email" :rules="[(v) => !!v || 'This field must be filled!']"></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field prepend-icon="mdi-phone" v-model="editedItem.phone" label="Phone" :rules="[(v) => !!v || 'This field must be filled!']"></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            dense
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            :type="show1 ? 'text' : 'password'"
            @click:append="show1 = !show1"
            prepend-icon="mdi-lock"
            v-model="editedItem.password"
            label="Password"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6" md="6">
          <v-text-field
            dense
            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
            :type="show2 ? 'text' : 'password'"
            @click:append="show2 = !show2"
            prepend-icon="mdi-lock"
            v-model="editedItem.passwordConfirm"
            label="Password Confirm"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-select v-model="editedItem.outlet" :items="dataOutlet" label="Outlet" prepend-icon="mdi-shape-outline" :rules="[(v) => !!v || 'This field must be filled!']"></v-select>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
export default {
  props: {
    editedItem: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      show1: false,
      show2: false,
      dataOutlet: ['Warung', 'Restoran', 'Cafe'],
    };
  },
  methods: {
    filter: function (evt) {
      evt = evt ? evt : window.event;
      let expect = evt.target.value.toString() + evt.key.toString();

      if (!/^[-+]?[0-9]*\.?[0-9]*$/.test(expect)) {
        evt.preventDefault();
      } else {
        return true;
      }
    },
  },
};
</script>

<style></style>
