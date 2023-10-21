<template>
  <v-form ref="form" lazy-validation>
    <v-container>
      <v-row>
        <v-col cols="12" md="12">
          <v-text-field prepend-icon="mdi-store-outline" v-model="editedItem.name" label="Category Name" :rules="[(v) => !!v || 'This field must be filled!']"></v-text-field>
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
      default: () => ({ name: '' }),
    },
  },

  methods: {},
};
</script>

<style></style>
