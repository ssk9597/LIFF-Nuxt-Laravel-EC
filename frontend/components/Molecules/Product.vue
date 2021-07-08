<template>
  <div class="product">
    <Heading :main="'Product'" :sub="'商品'" />
    <Card :products="products" :buyProducts="buyProducts" />
  </div>
</template>

<script>
// components
import Heading from '@/components/Atoms/Heading';
import Card from '@/components/Atoms/Card';

export default {
  components: {
    Heading,
    Card,
  },
  props: {
    products: {
      type: Object,
      required: true,
    },
    buyProducts: {
      type: Function,
      required: true,
    },
  },
};
</script>