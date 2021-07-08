<template>
  <div class="button">
    <button class="button-btn" @click="childBuyProduct()">購入する</button>
  </div>
</template>

<script>
export default {
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
  methods: {
    childBuyProduct() {
      this.buyProducts(this.products);
    },
  },
};
</script>

<style lang="scss" scoped>
.button {
  text-align: center;
  &-btn {
    display: inline-block;
    width: 200px;
    height: 40px;
    font-size: 18px;
    font-weight: bold;
    background: $color_yellow;
    border-color: transparent;
  }
}
</style>