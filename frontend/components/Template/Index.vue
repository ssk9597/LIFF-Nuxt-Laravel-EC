<template>
  <div class="container">
    <Header />
    <Hero />
    <Registration :lineLogin="lineLogin" />
    <div class="product">
      <Heading :main="'Product'" :sub="'商品'" />
      <div class="card">
        <div class="card-container" v-for="product in products.contents" :key="product.id">
          <img class="card-product-img" :src="product.image.url" />
          <p class="card-product-name">{{ product.name }}</p>
          <p class="card-product-price">¥{{ product.price }}</p>
          <div class="button">
            <button class="button-btn" @click="buyProducts(product)">購入する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// components
import Heading from '@/components/Atoms/Heading';
import Header from '@/components/Molecules/Header';
import Hero from '@/components/Molecules/Hero';
import Registration from '@/components/Molecules/Registration';

export default {
  components: {
    Heading,
    Header,
    Hero,
    Registration,
  },
  props: {
    products: {
      type: Object,
      required: true,
    },
  },
  methods: {
    async lineLogin() {
      try {
        // IDトークン
        const idToken = liff.getIDToken();
        if (idToken) {
          await this.$axios.$post('/hubspot/store', {
            idToken: idToken,
          });
        } else {
          alert('ログイン失敗しました。もう一度お試しください。');
        }
      } catch (err) {
        alert(err);
        alert(err.response.data.error);
        alert(err.response.data.error_description);
      }
    },
    async buyProducts(product) {
      await this.$axios.$post('/stripe/store', {
        productImage: product.image.url,
        productName: product.name,
        productPrice: product.price,
        productStripePriceApi: product.stripe_price_api,
      });
    },
  },
};
</script>

<style lang="scss">
.container {
  margin: 0 auto;
  background: $color_gray;
  width: 100%;
  max-width: 390px;
  padding-bottom: 60px;
}

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
