<template>
  <v-form ref="form" lazy-validation>
    <v-container>
      <v-row>
        <v-col cols="12" md="6">
          <v-text-field prepend-icon="mdi-store-outline" v-model="editedItem.name" label=" Name" :rules="[(v) => !!v || 'This field must be filled!']"></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field prepend-icon="mdi-percent-outline" @keypress="filter(event)" v-model="editedItem.percent" label="Percent" :rules="[(v) => !!v || 'This field must be filled!']"></v-text-field>
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
