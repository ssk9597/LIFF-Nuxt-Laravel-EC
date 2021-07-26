<template>
  <div class="product">
    <Heading :main="'Product'" :sub="'商品'" />
    <div class="card">
      <div class="card-container" v-for="product in products.contents" :key="product.id">
        <img class="card-product-img" :src="product.image.url" />
        <p class="card-product-name">{{ product.name }}</p>
        <p class="card-product-price">¥{{ product.price }}</p>
        <Button :products="products" @click="childClick" />
      </div>
    </div>
  </div>
</template>

<script>
// components
import Heading from '@/components/Atoms/Heading';
import Button from '@/components/Atoms/Button';

export default {
  components: {
    Heading,
    Button,
  },
  props: {
    products: {
      type: Object,
      required: true,
    },
  },
  methods: {
    childClick() {
      this.$emit('clickEvent');
    },
  },
};
</script>

<style lang="scss" scoped>
.card {
  &-container {
    border-radius: 10px;
    background: $color_white;
    width: 250px;
    height: 300px;
    margin: 0 auto 30px auto;
  }

  &-product {
    &-img {
      border-radius: 10px 10px 0 0;
      width: 250px;
      height: 150px;
    }

    &-name {
      padding: 20px 0 0 20px;
    }

    &-price {
      padding: 20px 0 20px 20px;
      font-weight: bold;
    }
  }
}
</style>