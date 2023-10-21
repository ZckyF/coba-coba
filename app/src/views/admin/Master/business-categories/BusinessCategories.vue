<template>
  <div>
    <Header page="Business Categories" />
    <TableBusinessCategories />
  </div>
</template>

<script>
import Header from '@/components/layouts-element/Header.vue';
import TableBusinessCategories from './TableBusinessCategories.vue';

export default {
  components: { Header, TableBusinessCategories },
};
</script>

<style></style>
