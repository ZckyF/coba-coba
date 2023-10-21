<template>
  <div>
    <v-btn v-if="enterColor" x-small class="mr-2" @click="editItem" :class="enterColor" height="20" min-width="1" width="20">
      <v-icon x-small color="white"> mdi-login-variant </v-icon>
    </v-btn>
    <v-btn v-if="blockColor" x-small class="mr-2" @click="editItem" :class="blockColor" height="20" min-width="1" width="20">
      <v-icon x-small color="white"> mdi-cancel </v-icon>
    </v-btn>
    <v-btn v-if="editColor" x-small class="mr-2" @click="editItem" :class="editColor" height="20" min-width="1" width="20">
      <v-icon x-small color="white">mdi-pencil-outline</v-icon>
    </v-btn>
    <v-btn v-if="deleteColor" x-small class="mr-2" @click="deleteItem" :class="deleteColor" height="20" min-width="1" width="20">
      <v-icon x-small color="white">mdi-delete-outline</v-icon>
    </v-btn>
  </div>
</template>

<script>
export default {
  props: {
    enterColor: String,
    editColor: String,
    deleteColor: String,
    blockColor: String,
  },
  methods: {
    editItem() {
      this.$emit('edit');
    },
    deleteItem() {
      this.$emit('delete');
    },
  },
};
</script>
