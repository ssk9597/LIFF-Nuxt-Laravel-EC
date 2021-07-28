<template>
  <div class="card">
    <img class="card-product-img" :src="this.$route.query.image" />
    <p class="card-product-name">{{ this.$route.query.name }}</p>
    <p class="card-product-price">¥{{ this.$route.query.price }}</p>
    <div class="button">
      <button type="submit" class="button-btn" @click="buyProducts">購入する</button>
    </div>
  </div>
</template>

<script>
export default {
  head: {
    script: [
      {
        src: 'https://js.stripe.com/v3/',
      },
    ],
  },
  methods: {
    async buyProducts() {
      const url = await this.$axios.$post('/stripe/store', {
        productImage: this.$route.query.image,
        productName: this.$route.query.name,
        productPrice: this.$route.query.price,
        productStripePriceApi: this.$route.query.stripePriceApi,
      });
      if (url) {
        this.$router.push(url);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.card {
  border-radius: 10px;
  background: $color_white;
  width: 250px;
  height: 300px;
  margin: 0 auto 30px auto;

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
