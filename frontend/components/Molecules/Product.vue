<template>
  <div class="product">
    <Heading :main="'Product'" :sub="'商品'" />
    <Card :products="products" @childClick="childClick" />
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
  },
  methods: {
    childClick(product) {
      alert('OK');
      alert(product);
      // this.$emit('buyProducts', product);
    },
  },
};
</script>