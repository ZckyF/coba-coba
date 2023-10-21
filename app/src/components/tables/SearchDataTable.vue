<template>
  <v-text-field v-model="search" prepend-inner-icon="mdi-magnify" label="Search" single-line hide-details placeholder="Search" @input="emitSearch"></v-text-field>
</template>

<script>
export default {
  data() {
    return {
      search: '',
    };
  },
  methods: {
    emitSearch() {
      this.$emit('search-changed', this.search);
    },
  },
};
</script>
