<template>
  <div>
    <Header page="Outlets" />
    <TableOutlets />
  </div>
</template>
<script>
import Header from '@/components/layouts-element/Header.vue';
import TableOutlets from './TableOutlets.vue';

export default {
  name: 'DaftarUsahaWP',
  components: { TableOutlets, Header },
};
</script>
<style></style>
