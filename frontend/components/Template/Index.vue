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
          <Button :products="products" @click="buyProducts(product)" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// components
import Heading from '@/components/Atoms/Heading';
import Button from '@/components/Atoms/Button';
import Header from '@/components/Molecules/Header';
import Hero from '@/components/Molecules/Hero';
import Registration from '@/components/Molecules/Registration';

export default {
  components: {
    Heading,
    Button,
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
        alert(idToken);
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
    buyProducts(product) {
      alert(product);
      alert(product.price);
      // await this.$axios.$post('/stripe/store', {
      //   product: product,
      // });
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
</style>
