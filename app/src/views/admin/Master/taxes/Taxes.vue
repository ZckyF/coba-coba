<template>
  <div>
    <Header page="Taxes" />
    <TableTaxes />
  </div>
</template>

<script>
import Header from '@/components/layouts-element/Header.vue';
import TableTaxes from './TableTaxes.vue';

export default {
  components: { Header, TableTaxes },
};
</script>

<style></style>
